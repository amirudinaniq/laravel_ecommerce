<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cart;
use App\Models\Orders;


class OrdersController extends Controller
{
    public function orders(Request $request){
        return view('pages.orders');
    }

    public function getOrders(Request $request){
        $user = auth()->user();
        $orders = Orders::with(array())->where('client_id',$user->id)->get();

        foreach($orders as $order){
            $order->order_details = json_decode($order->order_details);
            $order->client_address = json_decode($order->client_address);
        }

        return [
            'orders'=>$orders,
        ];
    }
}
