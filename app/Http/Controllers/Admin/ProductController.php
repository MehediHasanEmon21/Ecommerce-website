<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
class ProductController extends Controller
{
    public function index(){
    	$products = DB::table('products')
    						->join('categories','products.category_id','=','categories.id')
    						->join('manufactures','products.manufacture_id','=','manufactures.id')
    						->select('products.*','manufactures.manufacture_name','categories.category_name')
    						->get();
    	return view('admin.product.index',compact('products'));
    }


    public function create(){
    	$categories = DB::table('categories')->latest()->get();
    	$manufactures = DB::table('manufactures')->latest()->get();
    	return view('admin.product.create',compact('categories','manufactures'));
    }


    public function store(Request $request){

    	$this->validate($request,[
            'product_name'=>'required',
            'category_id'=>'required',
            'manufacture_id'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image'=>'required|image|mimes:jpeg,jpg,png,bmp',

			]);

        $image = $request->file('image');
        $slug = str_slug($request->product_name);

        if (isset($image)) {
            
            $currentDate = Carbon::now()->toDateString();
            $imageName   = $slug."-".$currentDate."-".uniqid().".".$image->getClientOriginalExtension();
            $upload_path ='public/product/';
            $image_url   = $upload_path.$imageName;
            $image->move($upload_path,$imageName);
        }else {
            $image_url = 'default.png';
        }

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->category_id;
        $data['manufacture_id'] = $request->manufacture_id;
        $data['description'] = $request->description;
        $data['price'] = $request->price;
        $data['image'] = $image_url;
        $data['size'] = $request->size;
        $data['color'] = $request->color;
        $data['status'] = $request->status;


        DB::table('products')->insert($data);
        Toastr::success('Product Successfully Added :)','Success');
        return redirect()->route('admin.product.index');
    }

     public function unactive_product($id){

        DB::table('products')
            ->where('id',$id)
            ->update(['status'=>false]);
        Toastr::success('Product Unactive Successfully :)','Success');
        return redirect()->back();

    }


    // ============ Active Category ============== //
    public function active_product($id){

        DB::table('products')
            ->where('id',$id)
            ->update(['status'=>true]);
        Toastr::success('Product Active Successfully :)','Success');
        return redirect()->back();

    }


    public function destroy($id){

        $product = DB::table('products')
                    ->where('id',$id)
                    ->first();
        $image_path = $product->image;
        if ($image_path) {
           unlink($image_path);
        }
        
        DB::table('products')->where('id',$id)->delete();
        Toastr::success('Product Successfully Deleted :)','Success');
        return redirect()->route('admin.product.index');
    }


    public function edit($id){
        $product = DB::table('products')
                    ->where('id',$id)
                    ->first();
        $categories = DB::table('categories')->latest()->get();
        $manufactures = DB::table('manufactures')->latest()->get();

        return view('admin.product.edit',compact('product','categories','manufactures'));
    }


    public function update(Request $request,$id){


      
            $this->validate($request,[
            'product_name'=>'required',
            'category_id'=>'required',
            'manufacture_id'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image'=>'image|mimes:jpeg,jpg,png,bmp',

            ]);
      

        $image = $request->file('image');
        $slug = str_slug($request->product_name);

        $product = DB::table('products')->where('id',$id)->first();
        $image_path = $product->image;

        if (isset($image)) {
            
            $currentDate = Carbon::now()->toDateString();
            $imageName   = $slug."-".$currentDate."-".uniqid().".".$image->getClientOriginalExtension();
            $upload_path ='public/product/';
            $image_url   = $upload_path.$imageName;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $image->move($upload_path,$imageName);
        }else {
            $image_url = $image_path;
        }

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->category_id;
        $data['manufacture_id'] = $request->manufacture_id;
        $data['description'] = $request->description;
        $data['price'] = $request->price;
        $data['image'] = $image_url;
        $data['size'] = $request->size;
        $data['color'] = $request->color;
        $data['status'] = $request->status;

        DB::table('products')->where('id',$id)->update($data);
        Toastr::success('Product Successfully Updated :)','Success');
        return redirect()->route('admin.product.index');

     }
}
