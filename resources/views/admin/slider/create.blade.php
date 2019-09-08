@extends('layouts.backend.app')

@section('title','Dashboard')

@push('css')

@endpush

@section('content')

<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i> 
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="#">Forms</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>ADD SLIDER</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <fieldset>
                    <div class="control-group">
                      <label class="control-label" for="slider_title">Slider Title</label>
                      <div class="controls">
                        <input type="text" class="span6" id="slider_title" name="slider_title">
                    </div>
                </div>

            <!-- <div class="control-group">
               <label class="control-label" for="fileInput">File input</label>
               <div class="controls">
                 <input class="input-file uniform_on" id="fileInput" type="file">
               </div>
           </div>          --> 
           <div class="control-group hidden-phone">
              <label class="control-label" for="slider_description">Slider Description</label>
              <div class="controls">
                <textarea class="cleditor" id="slider_description" rows="3" name="slider_description"></textarea>
            </div>
        </div>

        <div class="control-group">
             <img id="image" src="#" />
             <label class="control-label" for="image">Slider Image</label>
             <div class="controls">
               <input type="file" name="slider_image" class="input-file uniform_on" id="slider_image" accept="image/*">
             </div>
          </div>

        <div class="control-group">
          <label class="control-label" for="slider_status">Publication status</label>
          <div class="controls">
            <input type="checkbox" id="slider_status" name="slider_status" value="1" >
        </div>
    </div>
    <div class="form-actions">
      <button type="submit" class="btn btn-primary">Add Slider</button>
      <button type="reset" class="btn">Cancel</button>
  </div>
</fieldset>
</form>   

</div>
</div><!--/span-->

</div><!--/row-->
</div>




@endsection

@push('js')

@endpush