<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
class SliderController extends Controller
{
    // ============ All SLIDER ============== //
    public function index(){

    	$sliders = DB::table('sliders')->get();
    	return view('admin.slider.index',compact('sliders'));
    }


    // ============ Create Slider ============== //
    public function create(){
    	return view('admin.slider.create');
    }

     public function store(Request $request){

    	$this->validate($request,[
            'slider_title'=>'required',
            'slider_image'=>'required|image|mimes:jpeg,jpg,png,bmp',

			]);

        $image = $request->file('slider_image');
        $slug = str_slug($request->slider_title);

        if (isset($image)) {
            
            $currentDate = Carbon::now()->toDateString();
            $imageName   = $slug."-".$currentDate."-".uniqid().".".$image->getClientOriginalExtension();
            $upload_path ='public/slider/';
            $image_url   = $upload_path.$imageName;
            $image->move($upload_path,$imageName);
        }else {
            $image_url = 'default.png';
        }

        $data = array();
        $data['slider_title'] = $request->slider_title;
        $data['slider_description'] = $request->slider_description;
        $data['slider_image'] = $image_url;
        $data['slider_status'] = $request->slider_status;


        DB::table('sliders')->insert($data);
        Toastr::success('Slider Successfully Added :)','Success');
        return redirect()->route('admin.slider.index');
    }


    public function unactive_slider($id){

        DB::table('sliders')
            ->where('slider_id',$id)
            ->update(['slider_status'=>false]);
        Toastr::success('Slider Unactive Successfully :)','Success');
        return redirect()->back();

    }


    // ============ Active Category ============== //
    public function active_slider($id){

        DB::table('sliders')
            ->where('slider_id',$id)
            ->update(['slider_status'=>true]);
        Toastr::success('Slider Active Successfully :)','Success');
        return redirect()->back();

    }


    public function destroy($id){

        $slider = DB::table('sliders')
                    ->where('slider_id',$id)
                    ->first();
        $image_path = $slider->slider_image;
        if ($image_path) {
           unlink($image_path);
        }
        
        DB::table('sliders')->where('slider_id',$id)->delete();
        Toastr::success('Slider Successfully Deleted :)','Success');
        return redirect()->route('admin.slider.index');
    }

}
