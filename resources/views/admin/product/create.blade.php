@extends('layouts.backend.app')

@section('title','Product')

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
                <h2><i class="halflings-icon edit"></i><span class="break"></span>ADD PRODUCT</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <fieldset>
                    <div class="control-group">
                      <label class="control-label" for="product_name">Product Name</label>
                      <div class="controls">
                        <input type="text" class="span6" id="product_name" name="product_name">
                    </div>
                   </div>

                <div class="control-group">
                  <label class="control-label" for="category_id">Category Name</label>
                  <div class="controls">
                    <select id="category_id" name="category_id">
                      <option selected=""></option>
                      @foreach($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="manufacture_id">Brand Name</label>
                  <div class="controls">
                    <select id="manufacture_id" name="manufacture_id">
                      <option selected=""></option>
                      @foreach($manufactures as $manufacture)
                      <option value="{{ $manufacture->id }}">{{ $manufacture->manufacture_name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
    
            
           <div class="control-group hidden-phone">
              <label class="control-label" for="description">product Description</label>
              <div class="controls">
                <textarea class="cleditor" id="description" rows="3" name="description"></textarea>
            </div>
          </div>
          
          <div class="control-group">
            <label class="control-label" for="price">Price</label>
            <div class="controls">
              <input type="text" class="span6" id="price" name="price">
            </div>
         </div>
          
          <div class="control-group">
             <img id="image" src="#" />
             <label class="control-label" for="image">Image</label>
             <div class="controls">
               <input type="file" name="image" class="input-file uniform_on" id="image" accept="image/*"  required onchange="readURL(this);">
             </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="size">Size</label>
            <div class="controls">
              <input type="text" class="span6" id="size" name="size">
            </div>
         </div>

          <div class="control-group">
            <label class="control-label" for="color">Color</label>
            <div class="controls">
              <input type="text" class="span6" id="color" name="color">
            </div>
         </div>        

        <div class="control-group">
          <label class="control-label" for="status">Publication status</label>
          <div class="controls">
            <input type="checkbox" id="status" name="status" value="1" >
        </div>
    </div>
    <div class="form-actions">
      <button type="submit" class="btn btn-primary">Add product</button>
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

<script type="text/javascript">
    function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#image')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>

@endpush