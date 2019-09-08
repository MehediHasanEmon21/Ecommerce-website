<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Illuminate\Http\Request;
class OrderController extends Controller
{
    public function index(){

    	$orders = DB::table('orders')
    			  ->join('customers','orders.customer_id','=','customers.customer_id')
    			  ->select('orders.*','customers.customer_name')
    			  ->get();
    	return view('admin.order.index',compact('orders'));
    }

    public function show($id){

    	$orders_information = DB::table('orders')
    						  ->join('customers','orders.customer_id','=','customers.customer_id')
    						  ->join('shippings','orders.shipping_id','=','shippings.shipping_id')
    						  ->join('order_details','orders.order_id','=','order_details.order_id')
    						  ->select('customers.*','shippings.*','order_details.*')
    						  ->where('orders.order_id',$id)
    						  ->get();


    	return view('admin.order.show',compact('orders_information'));
    }

    public function active($id){

        DB::table('orders')->where('order_id',$id)->update(['order_status'=> 1]);
        Toastr::success('Ordered Delivered Successfully :)','Success');
        return redirect()->route('admin.order.index');
    }
}
