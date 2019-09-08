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
        <li><a href="#">Tables</a></li>
    </ul>

    <div class="row-fluid sortable">        
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
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
                            <th>Category ID</th>
                            <th>Category Name</th>
                            <th>Category Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>   
                    <tbody>

                        @foreach($categories as $key => $category)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td class="center">{{ $category->category_name }}</td>
                            <td class="center">{!! $category->description !!}</td>
                            <td class="center">
                                @if($category->status == true)
                                   <span class="label label-success">Publish</span>
                                @else
                                    <span class="label label-danger">Unpublish</span>
                                @endif
                                
                            </td>
                            <td class="center">

                                @if($category->status == false)
                                    <a class="btn btn-success" href="{{ route('admin.active.category',$category->id) }}">
                                        <i class="halflings-icon white thumbs-up"></i>  
                                    </a>
                                @else
                                    <a class="btn btn-danger" href="{{ route('admin.unactive.category',$category->id) }}">
                                        <i class="halflings-icon white thumbs-down"></i>  
                                    </a>
                                @endif
                                <a class="btn btn-info" href="{{ route('admin.category.edit',$category->id) }}">
                                    <i class="halflings-icon white edit"></i>  
                                </a>
                                <a id="delete" class="btn btn-danger" href="{{route('admin.category.destroy',$category->id) }}">
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