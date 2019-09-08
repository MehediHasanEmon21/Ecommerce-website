<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Brian2694\Toastr\Facades\Toastr;
class CartController extends Controller
{
    public function add_cart(Request $request){
    	
    	$id = $request->id;
    	$quantity = $request->quantity;
    	$product = DB::table('products')
    			  ->where('id',$id)
    			  ->first();
    	$data = array();

    	$data['id'] = $product->id;
    	$data['name'] = $product->product_name;
    	$data['price'] = $product->price;
    	$data['quantity'] = $quantity;
    	$data['attributes'] ['image'] = $product->image;
    	Cart::add($data);

    	return redirect()->route('cart.show');
  

    }

    public function show_cart(){

    	$cart_products = Cart::getContent();
    	return view('show_cart',compact('cart_products'));

    }

    public function delete_cart($id){

    	Cart::remove($id);
    	Toastr::success('Cart Product Successfully Deleted :)','Success');
    	return redirect()->route('cart.show');
    }

    public function update_cart($id,Request $request){
    	$quantity = $request->quantity;

    	Cart::update($id, array(
          'quantity' => array(
              'relative' => false,
              'value' => $quantity
          ),
        ));

        Toastr::success('Cart Product Successfully Updated :)','Success');
    	return redirect()->route('cart.show');

    }
}
