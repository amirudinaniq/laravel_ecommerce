<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PointsController extends Controller
{
    public function points(Request $request){
        return view('pages.orders');
    }
}
