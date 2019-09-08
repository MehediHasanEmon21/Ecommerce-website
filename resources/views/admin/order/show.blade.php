@extends('layouts.backend.app')

@section('title','Order-Details')

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

    <div class="row-fluid sortable ui-sortable">
        <div class="box span6">
            <div class="box-header">
                <h2><i class="halflings-icon align-justify"></i><span class="break"></span>CUSTOMER DETAILS</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            @foreach($orders_information as $order_info)
            @endforeach
            <div class="box-content">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Mobile</th>
                                                              
                        </tr>
                    </thead>   
                    <tbody>
                    
                       
                        <tr>
                            <td>{{ $order_info->customer_name }}</td>
                            <td class="center">{{ $order_info->customer_phone }}</td>
                                                          
                        </tr>
                        
                    </tbody>
                </table>  
              
            </div>
        </div><!--/span-->

        <div class="box span6">
            <div class="box-header">
                <h2><i class="halflings-icon align-justify"></i><span class="break"></span>SHIPPING DETAILS</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Address</th>
                            <th>Mobile</th>
                                                       
                        </tr>
                    </thead>   
                    <tbody>
                        <tr>
                            <td>{{ $order_info->shipping_name }}</td>
                            <td class="center">{{ $order_info->shipping_address }}</td>
                            <td class="center">{{ $order_info->shipping_mobile }}</td>                                      
                         </tr>
                                 
                    </tbody>
                </table>  
              
            </div>
        </div><!--/span-->
    </div>

    <div class="row-fluid sortable">        
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>ORDER DETAILS</h2>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Sales Quantity</th>
                            <th>Total Tk</th>
                        </tr>
                    </thead>   
                    <tbody>

                       @foreach($orders_information as $product_info)
                        <tr>
                            <td>{{ $product_info->order_details_id }}</td>
                            <td class="center">{{ $product_info->product_name }}</td>
                            <td class="center">{{ $product_info->product_price }}</td>
                            <td class="center">{{ $product_info->product_sales_quantity }}</td>
                            @php
                               $total =  $product_info->product_price*$product_info->product_sales_quantity;
                            @endphp
                            <td class="center">{{ $total }}</td>
                            
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