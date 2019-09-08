@extends('layouts.backend.app')

@section('title','Manufacture')

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
                <h2><i class="halflings-icon edit"></i><span class="break"></span>ADD MANUFACTURE</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="{{ route('admin.manufacture.store') }}" method="POST">
                    @csrf
                  <fieldset>
                    <div class="control-group">
                      <label class="control-label" for="manufacture_name">Manufacture Name</label>
                      <div class="controls">
                        <input type="text" class="span6" id="manufacture_name" name="manufacture_name">
                    </div>
                </div>

            <!-- <div class="control-group">
               <label class="control-label" for="fileInput">File input</label>
               <div class="controls">
                 <input class="input-file uniform_on" id="fileInput" type="file">
               </div>
           </div>          --> 
           <div class="control-group hidden-phone">
              <label class="control-label" for="description">Manufacture Description</label>
              <div class="controls">
                <textarea class="cleditor" id="description" rows="3" name="description"></textarea>
            </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="status">Publication status</label>
          <div class="controls">
            <input type="checkbox" id="status" name="status" value="1" >
        </div>
    </div>
    <div class="form-actions">
      <button type="submit" class="btn btn-primary">Add Manufacture</button>
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