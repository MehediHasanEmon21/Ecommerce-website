<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $products = DB::table('products')->latest()->take(6)->get();
        $categories = DB::table('categories')->latest()->take(8)->get();
        $recomended_items = DB::table('products')
                            ->where('status',true)
                            ->inRandomOrder()
                            ->take(3)
                            ->get();
        return view('welcome',compact('products','categories','recomended_items'));
    }

    public function category_products($slug){

        $category_products = DB::table('products')
                            ->join('categories','products.category_id','=','categories.id')
                            ->where('categories.slug',$slug)
                            ->where('categories.status',true)
                            ->select('products.*','categories.category_name')
                            ->take(5)
                            ->get();

        return view('category_product',compact('category_products'));


    }

    public function manufacture_products($slug){

        $manufacture_products = DB::table('products')
                            ->join('manufactures','products.manufacture_id','=','manufactures.id')
                            ->where('manufactures.slug',$slug)
                            ->where('manufactures.status',true)
                            ->select('products.*','manufactures.manufacture_name')
                            ->take(5)
                            ->get();

        return view('manufacture_product',compact('manufacture_products'));


    }

    public function show_product($id){

        $product = DB::table('products')
                  ->join('categories','products.category_id','=','categories.id')
                  ->join('manufactures','products.manufacture_id','=','manufactures.id')
                  ->where('products.id',$id)
                  ->select('products.*','categories.category_name','manufactures.manufacture_name')
                  ->first();

        return view('product',compact('product'));


    }

    public function all_products(){
        $products = DB::table('products')->latest()->paginate(9);
        return view('products',compact('products'));
    }

    public function contact(){

      return view('contact');
    }
}
