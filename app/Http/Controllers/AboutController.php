<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function team(){
        return view('pages.team');
    }

    public function contact(){
        return view('pages.contact');
    }

    public function blog(){
        return view('pages.blog');
    }
}
