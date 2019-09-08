<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Brian2694\Toastr\Facades\Toastr;
use Session;
class CustomerLoginController extends Controller
{
    public function customer_registration(Request $request){

    	$this->validate($request,[
    		'customer_name'=>'required',
    		'customer_email'=>'required',
    		'customer_password'=>'required',
    		'customer_phone'=>'required',
    	]);

    	$data = array();

    	$data['customer_name'] = $request->customer_name;
    	$data['customer_email'] = $request->customer_email;
    	$data['customer_password'] = md5($request->customer_password);
    	$data['customer_phone'] = $request->customer_phone;

    	$customer_id = DB::table('customers')->insertGetId($data);

    	Session::put('customer_id',$customer_id);
    	Session::put('customer_name',$request->customer_name);

    	Toastr::success('Registration Successfully done :)','Success');
    	return redirect()->route('checkout.index');

    }

    public function customer_login(Request $request){

    	$this->validate($request,[
    		'customer_email'=>'required',
    		'customer_password'=>'required',
    	]);

    	$customer_email = $request->customer_email;
    	$customer_password = md5($request->customer_password);

    	$result = DB::table('customers')
    			->where('customer_email',$customer_email)
    			->where('customer_password',$customer_password)
    			->first();

    	if ($result) {

    		Session::put('customer_id',$result->customer_id);
    		return redirect()->route('checkout.index');
    	}
    }

    public function customer_logout(){
    	Session::flush();
    	Toastr::success('You Logged Out Successfully :)','Success');
    	return redirect()->route('home');
    }
}
