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
        <li><a href="#">Tables</a></li>
    </ul>

    <div class="row-fluid sortable">        
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>All PRODUCTS</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Category Name</th>
                            <th>Brand Name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>   
                    <tbody>

                        @foreach($products as $key => $product)
                        <tr>
                            <td>{{ $product->product_name }}</td>
                            <td class="center"><img src="{{ URL::to($product->image) }}" width="40" height="40"></td>
                            <td class="center">{{  $product->category_name }}</td>
                            <td class="center">{{  $product->manufacture_name }}</td>
                            <td class="center">
                                @if($product->status == true)
                                   <span class="label label-success">Publish</span>
                                @else
                                    <span class="label label-danger">Unpublish</span>
                                @endif
                                
                            </td>
                            <td class="center">

                                @if($product->status == false)
                                    <a class="btn btn-success" href="{{ route('admin.active.product',$product->id) }}">
                                        <i class="halflings-icon white thumbs-up"></i>  
                                    </a>
                                @else
                                    <a class="btn btn-danger" href="{{ route('admin.unactive.product',$product->id) }}">
                                        <i class="halflings-icon white thumbs-down"></i>  
                                    </a>
                                @endif
                                <a class="btn btn-info" href="{{ route('admin.product.edit',$product->id) }}">
                                    <i class="halflings-icon white edit"></i>  
                                </a>
                                <a id="delete" class="btn btn-danger" href="{{route('admin.product.destroy',$product->id) }}">
                                    <i class="halflings-icon white trash"></i> 
                                </a>
                            </td>
                        </tr>
                       @endforeach
                   </tbody>
            </table>            
        </div>
    </div><!--/span-->
    
</div><!--/row-->




@endsection

@push('js')

@endpush