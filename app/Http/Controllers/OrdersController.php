<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cart;


class OrdersController extends Controller
{
    public function orders(Request $request){
        return view('pages.orders');
    }

    public function getOrders(Request $request){
        $user = auth()->user();
        $userItems = Cart::where('user_id',$user->id)->sum('quantity');

        return [
            'items'=>$userItems,
        ];
    }
}
