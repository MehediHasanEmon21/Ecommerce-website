<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function login(){
    	return view('login');
    }

    public function checkout(){
    	return view('checkout');
    }
}
