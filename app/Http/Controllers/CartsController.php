<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Cart;


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
                            $data['grand_total'] = $grand_total;

                        }

                    }
                }
            }
           
        }

        $result = array();
        $result['cartItems'] = $data;
        return $result;     

    }
}
