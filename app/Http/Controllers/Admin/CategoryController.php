<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{   
    // ============ All Category ============== //
    public function index(){

    	$categories = DB::table('categories')->get();
    	return view('admin.category.index',compact('categories'));
    }


    // ============ Create Category ============== //
    public function create(){
    	return view('admin.category.create');
    }


    // ============ Add Category ============== //
    public function store(Request $request){

    	$this->validate($request,[
    		'category_name'=>'required|unique:categories',
    	]);

    	$data = array();

    	$data['category_name'] = $request->category_name;
    	$data['slug'] = str_slug($request->category_name);
    	$data['description'] = $request->description;
    	$data['status'] = $request->status;

    	DB::table('categories')->insert($data);
    	Toastr::success('Category Successfully Added :)','Success');
    	return redirect()->route('admin.category.index');


    }



    // ============ Edit Category ============== //
    public function edit($id){
        $category = DB::table('categories')
                    ->where('id',$id)
                    ->first();
        return view('admin.category.edit',compact('category'));
    }


    // ============ Update Category ============== //
    public function update(Request $request,$id){

        $this->validate($request,[
            'category_name'=>'required',
        ]);

        $data = array();

        $data['category_name'] = $request->category_name;
        $data['slug'] = str_slug($request->category_name);
        $data['description'] = $request->description;
        $data['status'] = $request->status;

        DB::table('categories')
            ->where('id',$id)
            ->update($data);
        Toastr::success('Category Successfully Updated :)','Success');
        return redirect()->route('admin.category.index');

    }


    // ============ Delete Category ============== //
    public function destroy($id){
        DB::table('categories')
            ->where('id',$id)
            ->delete();
        Toastr::success('Category Deleted Successfully :)','Success');
        return redirect()->back();
    }


    // ============ Unactive Category ============== //
    public function unactive_category($id){

        DB::table('categories')
            ->where('id',$id)
            ->update(['status'=>false]);
        Toastr::success('Category Unactive Successfully :)','Success');
        return redirect()->back();

    }


    // ============ Active Category ============== //
    public function active_category($id){

        DB::table('categories')
            ->where('id',$id)
            ->update(['status'=>true]);
        Toastr::success('Category Active Successfully :)','Success');
        return redirect()->back();

    }
}
