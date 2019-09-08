<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Brian2694\Toastr\Facades\Toastr;

class ManufactureController extends Controller
{
    // ============ All Category ============== //
    public function index(){

    	$manufactures = DB::table('manufactures')->get();
    	return view('admin.manufacture.index',compact('manufactures'));
    }


    // ============ Create Category ============== //
    public function create(){
    	return view('admin.manufacture.create');
    }


    // ============ Add Category ============== //
    public function store(Request $request){

    	$this->validate($request,[
    		'manufacture_name'=>'required|unique:manufactures',
    	]);

    	$data = array();

    	$data['manufacture_name'] = $request->manufacture_name;
    	$data['slug'] = str_slug($request->manufacture_name);
    	$data['description'] = $request->description;
    	$data['status'] = $request->status;

    	DB::table('manufactures')->insert($data);
    	Toastr::success('Manufacture Successfully Added :)','Success');
    	return redirect()->route('admin.manufacture.index');


    }



    // ============ Edit Category ============== //
    public function edit($id){
        $manufacture = DB::table('manufactures')
                    ->where('id',$id)
                    ->first();
        return view('admin.manufacture.edit',compact('manufacture'));
    }


    // ============ Update Category ============== //
    public function update(Request $request,$id){

        $this->validate($request,[
            'manufacture_name'=>'required',
        ]);

        $data = array();

        $data['manufacture_name'] = $request->manufacture_name;
        $data['slug'] = str_slug($request->manufacture_name);
        $data['description'] = $request->description;
        $data['status'] = $request->status;

        DB::table('manufactures')
            ->where('id',$id)
            ->update($data);
        Toastr::success('Manufactures Successfully Updated :)','Success');
        return redirect()->route('admin.manufacture.index');

    }


    // ============ Delete Category ============== //
    public function destroy($id){
        DB::table('manufactures')
            ->where('id',$id)
            ->delete();
        Toastr::success('Manufacture Deleted Successfully :)','Success');
        return redirect()->back();
    }


    // ============ Unactive Category ============== //
    public function unactive_manufacture($id){

        DB::table('manufactures')
            ->where('id',$id)
            ->update(['status'=>false]);
        Toastr::success('Manufacture Unactive Successfully :)','Success');
        return redirect()->back();

    }


    // ============ Active Category ============== //
    public function active_manufacture($id){

        DB::table('manufactures')
            ->where('id',$id)
            ->update(['status'=>true]);
        Toastr::success('Manufacture Active Successfully :)','Success');
        return redirect()->back();

    }
}
