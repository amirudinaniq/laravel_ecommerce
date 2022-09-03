<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Orders;

use Stripe;


class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCart()
    {
        $user = auth()->user();
        $userItems = Cart::where('user_id',$user->id)->sum('quantity');

        return [
            'items'=>$userItems,
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $product_id = $request->product_id;

        $product = Product::where('id',$product_id)->first();

        $productInCart = Cart::where('product_id',$product_id)->pluck('id');
        
        if (!$productInCart->isEmpty()) {
            //increment qty
            $cart = Cart::where('product_id',$product_id)->increment('quantity');
        }else{
            //adding product in cart
            $cart = Cart::create([
            'product_id' => $product->id,
            'quantity' => 1,
            'price' => $product->sale_price,
            'user_id' => $user->id,
            ]);
        }

      
        $userItems = Cart::where('user_id',$user->id)->sum('quantity');


        if($cart){
            return [
                'message'=>'Cart Updated',
                'items'=>$userItems,
            ];
        }
    }

    public function checkout(){
        return view('pages.checkout');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getCartItemsForCheckout(){
        $user = auth()->user();
        $cartItems = Cart::with('product')->where('user_id',$user->id)->get();

        $data = array();
        $grand_total = 0;

        if($cartItems){
            foreach($cartItems as $item){
                if($item->product){
                    foreach($item->product as $cartProduct){
                        if($cartProduct->id == $item->product_id){
                            $data[$item->product_id]['id'] = $cartProduct->id;
                            $data[$item->product_id]['name'] = $cartProduct->name;
                            $data[$item->product_id]['price'] = $item->price;
                            $data[$item->product_id]['quantity'] = $item->quantity;
                            $data[$item->product_id]['total_price'] = $item->price * $item->quantity;
                            $grand_total += $item->price * $item->quantity;

                        }

                    }
                }
            }
           
        }

        $result = array();
        $result['cartItems'] = $data;
        $result['grand_total'] = $grand_total;

        return $result;     
    }

    public function processPayment(Request $request)
    {
        // dd($request->all());
        $result = [];
        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $country = $request->country;
        $address = $request->address;
        $city = $request->city;
        $state = $request->state;
        $zipcode = $request->zipcode;
        $phoneNumber = $request->phoneNumber;
        $email = $request->email;
        $card_type = $request->card_type;
        $card_number = $request->card_number;
        $card_cvv = $request->card_cvv;
        $expiration_month = $request->expiration_month;
        $expiration_year = $request->expiration_year;
        $amount = $request->amount;
        $orders = $request->order;
        $ordersArray = [];
        $customer_id = auth()->user()->id;

        //Getting Order Details

        foreach ($orders as $key => $order) {
            if($order['id']){
                $ordersArray[$order['id']]['product_id'] = $order['id'];
                $ordersArray[$order['id']]['product_name'] = $order['name'];
                $ordersArray[$order['id']]['product_price'] = $order['price'];
                $ordersArray[$order['id']]['quantity'] = $order['quantity'];
                $ordersArray[$order['id']]['total_price'] = $order['total_price'];
            }
        }

        $stripe = Stripe::make(env('STRIPE_API_KEY'));

        $token = $stripe->tokens()->create([
           'card' => [
            'number' => $card_number,
            'exp_month' => $expiration_month,
            'exp_year' => $expiration_year,
            'cvc' => $card_cvv,
           ]
        ]);

        if(!$token['id']){
            session()->flush('error','Stripe Token generation failed');
            return;
        }

        //Create a customer stripe

        $customer = $stripe->customers()->create([
            'name' => $firstName.' '.$lastName,
            'email' => $email,
            'phone' => $phoneNumber,
            'address' => [
                'line1' => $address,
                'postal_code' => $zipcode,
                'city' => $city,
                'state' => $state,
                'country' => $country,
            ],
            'shipping' => [
                'name' =>  $firstName.' '.$lastName,
                'address' => [
                    'line1' => $address,
                    'postal_code' => $zipcode,
                    'city' => $city,
                    'state' => $state,
                    'country' => $country,
                ],
            ],
            'source' => $token['id'],
        ]);

     
        //code for charging the client in Stripe
        $charge = $stripe->charges()->create([
            'customer' => $customer['id'],
            'currency' => 'MYR',
            'amount' => $amount,
            'description' => 'Payment for order',
        ]);

        if($charge['status'] == 'succeeded'){
            //Capture the details from stripe

            $customerIdStripe = $charge['id'];
            $amountRec = $charge['amount'];
            
            $orderDetails = Orders::create([
                'client_id' => $customer_id,
                'client_name' => $firstName.' '.$lastName,
                'client_address' => json_encode([
                    'line1' => $address,
                    'postal_code' => $zipcode,
                    'city' => $city,
                    'state' => $state,
                    'country' => $country,
                ]),
                'order_details' => json_encode($ordersArray),
                'amount' => $amount,
                'currency' => $charge['currency'],
            ]);

            if($orderDetails)
            {
                //empty the cart
                Cart::where('user_id',$customer_id)->delete();

                $result['message'] = "Order completed successfully";
            }

        }else{
            $result['message'] = "Order failed contact support";
        }

        return $result;

    }
}
