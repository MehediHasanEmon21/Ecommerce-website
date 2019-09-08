@extends('layouts.frontend.app')

@section('title','Home')


@section('sidebar')
@include('layouts.frontend.partial.sidebar')
@endsection

@section('content')


<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Brand Items</h2>
        @foreach($manufacture_products as $product)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{ URL::to($product->image) }}" width="200" height="200" alt="" />
                        <h2>{{ $product->price }} tk</h2>
                        <p>{{ $product->product_name }}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>{{ $product->price }} tk</h2>
                            <a href="{{ route('product.show',$product->id) }}"><p>{{ $product->product_name }}</p></a>
                            <a href="{{ route('product.show',$product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                        <li><a href="{{ route('product.show',$product->id) }}"><i class="fa fa-plus-square"></i>View Product</a></li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
        
    </div><!--features_items-->
    

<!--/recommended_items-->
    
</div>



@endsection