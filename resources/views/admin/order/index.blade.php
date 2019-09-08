@extends('layouts.backend.app')

@section('title','Order')

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
                <h2><i class="halflings-icon user"></i><span class="break"></span>All ORDERS</h2>
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
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>   
                    <tbody>

                        @foreach($orders as $key => $order)
                        <tr>
                            <td>{{ $order->order_id }}</td>
                            <td class="center">{{  $order->customer_name }}</td>
                            <td class="center">{{  $order->order_total }}</td>
                            <td class="center">
                                @if($order->order_status == true)
                                   <span class="label label-success">Ok</span>
                                @else
                                    <span class="label label-danger">Pending</span>
                                @endif
                                
                            </td>
                            <td class="center">

                                @if($order->order_status == false)
                                    <a class="btn btn-success" href="{{ route('admin.active.order',$order->order_id) }}">
                                        <i class="halflings-icon white thumbs-up"></i>  
                                    </a>
                                @endif
                                <a class="btn btn-info" href="{{ route('admin.order.show',$order->order_id) }}">
                                    <i class="icon-eye-open"></i>  
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