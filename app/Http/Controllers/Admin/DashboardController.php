<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class DashboardController extends Controller
{
    public function index(){
    	$customers_count = DB::table('customers')->get()->count();
    	$orders_count = DB::table('orders')->where('order_status',0)->get()->count();
    	$products_count = DB::table('products')->where('status',1)->get()->count();
    	$categories_count = DB::table('categories')->where('status',1)->get()->count();
    	$brands_count = DB::table('manufactures')->where('status',1)->get()->count();
    	$sliders_count = DB::table('sliders')->get()->count();
    	$orders = DB::table('orders')
    			  ->join('customers','orders.customer_id','=','customers.customer_id')
    			  ->select('orders.*','customers.customer_name')
    			  ->where('order_status',0)
    			  ->get();
    	return view ('admin.dashboard',compact('customers_count','orders_count','products_count','brands_count','sliders_count','categories_count','orders'));
    }
}
