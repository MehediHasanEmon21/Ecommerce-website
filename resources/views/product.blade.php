@extends('layouts.frontend.app')

@section('title','Product')


@section('sidebar')
@include('layouts.frontend.partial.sidebar')
@endsection

@section('content')

<div class="col-sm-9 padding-right">
    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">
                <img src="{{ URL::to($product->image) }}" alt="">
                <h3>ZOOM</h3>
            </div>
            <div id="similar-product" class="carousel slide" data-ride="carousel">

              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <div class="item">
                  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
              </div>
              <div class="item active">
                  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
              </div>
              <div class="item">
                  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
              </div>

          </div>

          <!-- Controls -->
          <a class="left item-control" href="#similar-product" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right item-control" href="#similar-product" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>

</div>
<div class="col-sm-7">
    <div class="product-information"><!--/product-information-->
        <h2>{{ $product->product_name }}</h2>
        <p><strong>Color : </strong>{{ $product->color }}</p>
        <img src="{{ asset('public/assets/frontend/images/product-details/rating.png') }}" alt="">
        <span>
            <span>TK {{ $product->price }}</span>
            <label>Quantity:</label>
            
            <form action="{{ route('cart.add') }}" method="POST">
            @csrf
            <input type="number" value="1" name="quantity">
            <input type="hidden" name="id" value="{{ $product->id }}">
            <button type="submit" class="btn btn-fefault cart">
                <i class="fa fa-shopping-cart"></i>
                Add to cart
            </button>

            </form>
        </span>
        <p><b>Availability:</b> In Stock</p>
        <p><b>Categories:</b> {{ $product->category_name }}</p>
        <p><b>Brand:</b> {{ $product->manufacture_name }}</p>
        <a href=""><img src="{{ asset('public/assets/frontend/images/product-details/share.png') }}" class="share img-responsive" alt=""></a>
    </div><!--/product-information-->
</div>
</div><!--/product-details-->

<div class="category-tab shop-details-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li><a href="#details" data-toggle="tab">Details</a></li>
            <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade" id="details">
            {{ $product->description }}
        </div>



        <div class="tab-pane fade active in" id="reviews">
            <div class="col-sm-12">
                <ul>
                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                <p><b>Write Your Review</b></p>

                <form action="#">
                    <span>
                        <input type="text" placeholder="Your Name">
                        <input type="email" placeholder="Email Address">
                    </span>
                    <textarea name=""></textarea>
                    <b>Rating: </b> <img src="{{ asset('public/assets/frontend/images/product-details/rating.png') }}" alt="">
                    <button type="button" class="btn btn-default pull-right">
                        Submit
                    </button>
                </form>
            </div>
        </div>

    </div>
</div><!--/category-tab-->



</div>



@endsection