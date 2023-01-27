<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cart;
use App\Models\Orders;
use App\Models\Product;
use Cartalyst\Stripe\Api\Products;

class OrdersController extends Controller
{
    public function orders(Request $request){
        return view('pages.orders');
    }

    public function getOrders(Request $request){
        $user = auth()->user();
        $orders = Orders::with(array())
        // ->leftJoin('orders_products','orders_products.product_id','=','orders.product_id')
        // ->selectRaw('orders.id as orderID')
        // ->selectRaw('products.id as productID')
        ->with('ordersProducts')
        ->where('client_id',$user->id)
        ->orderBy('id','desc')
        ->get();

        foreach($orders as $order){
            $order->order_details = json_decode($order->order_details);
            $order->client_address = json_decode($order->client_address);

            $productsArr = array();

            foreach($order->ordersProducts as $ordersProducts){
                $product_id = $ordersProducts->product_id;

                $product = Product::find($product_id);
                $productsArr[] = $product;
            }

            $order->products = $productsArr;
        }

        // dd($orders);

        return [
            'orders'=>$orders,
        ];
    }
}
