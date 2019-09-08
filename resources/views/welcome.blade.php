@extends('layouts.frontend.app')

@section('title','Home')

@section('slider')
@include('layouts.frontend.partial.slider')
@endsection

@section('sidebar')
@include('layouts.frontend.partial.sidebar')
@endsection

@section('content')


<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Features Items</h2>
        @foreach($products as $product)
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
    
          <div class="category-tab"><!--category-tab-->
            <div class="col-sm-12">
              <ul class="nav nav-tabs">
                @foreach($categories as $key=>$category)
                <li class="{{ $key==0 ? 'active':'' }}"><a href="#{{ $category->category_name }}" data-toggle="tab">{{ $category->category_name }}</a></li>
                @endforeach
              </ul>
            </div>
            <div class="tab-content">

              @foreach($categories as $key=>$category)
             
      
              <div class="tab-pane fade {{ $key==0 ? 'active':'' }} in" id="{{ $category->category_name }}" >
                
                 @php
                 $cat_products = DB::table('products')
                              ->where('category_id',$category->id)
                              ->where('status',true)
                              ->get();
                 @endphp

                @foreach($cat_products as $key=>$product)
                <div class="col-sm-3">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="{{ URL::to($product->image) }}" width="190" height="170" alt="" />
                        <h2>Tk{{ $product->price }}</h2>
                        <p>{{ $product->product_name }}</p>
                       <a href="{{ route('product.show',$product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                      </div>
                      
                    </div>
                  </div>
                </div>
                @endforeach

              </div>
              @endforeach
            </div>
          </div><!--/category-tab-->
    
    <div class="recommended_items"><!--recommended_items-->
        <h2 class="title text-center">recommended items</h2>
        
        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">

              @php
                for ($i=0; $i <2 ; $i++) :
                
              @endphp
                <div class="item {{ $i==0 ? 'active' : '' }}">
                    @foreach($recomended_items as $item)   
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ URL::to($item->image) }}" width="190" height="170" alt="" />
                                    <h2>tk{{ $item->price }}</h2>
                                    <p>{{ $item->product_name }}</p>
                                     <a href="{{ route('product.show',$item->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                @php
                  endfor;
                @endphp
            </div>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>          
        </div>
    </div><!--/recommended_items-->
    
</div>



@endsection