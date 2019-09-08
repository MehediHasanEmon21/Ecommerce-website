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
        <li><a href="#">Dashboard</a></li>
    </ul>


      



    <div class="row-fluid"> 

        <a class="quick-button metro yellow span2">
            <i class="icon-group"></i>
            <p>Users</p>
            <span class="badge">{{ $customers_count }}</span>
        </a>
        <a class="quick-button metro red span2">
            <i class="icon-comments-alt"></i>
            <p>Sliders</p>
            <span class="badge">{{ $sliders_count }}</span>
        </a>
        <a class="quick-button metro blue span2">
            <i class="icon-shopping-cart"></i>
            <p>Orders</p>
            <span class="badge">{{ $orders_count }}</span>
        </a>
        <a class="quick-button metro green span2">
            <i class="icon-barcode"></i>
            <p>Products</p>
            <span class="badge">{{ $products_count }}</span>
        </a>
        <a class="quick-button metro pink span2">
            <i class="icon-envelope"></i>
            <p>Category</p>
            <span class="badge">{{ $categories_count }}</span>
        </a>
        <a class="quick-button metro black span2">
            <i class="icon-calendar"></i>
            <p>Brand</p>
            <span class="badge">{{ $brands_count }}</span>
        </a>

      
    </div>
    <br><br><br>
        <div class="clearfix"></div>

        <div class="row-fluid sortable">        
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>All PENDING ORDERS</h2>
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
    
</div>

    </div><!--/row-->


<!--/.fluid-container-->

@endsection

@push('js')

@endpush