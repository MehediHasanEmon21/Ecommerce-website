@extends('layouts.frontend.app')

@section('title','Cart')

@section('slider')

@endsection

@section('sidebar')

@endsection

@section('content')

<section id="cart_items">
    <div class="container">
      <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">Check out</li>
        </ol>
      </div><!--/breadcrums-->


      <div class="register-req">
        <p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
      </div><!--/register-req-->

      <div class="shopper-informations">
        <div class="row">
    
          <div class="col-sm-12 clearfix">
            <div class="bill-to">
              <p>Bill To</p>
              <div class="form-one">
                <form action="{{ route('shipping.store') }}" method="POST">
                  @csrf
                  <input type="text" placeholder="Shipping Name" name="shipping_name">
                  <input type="text" placeholder="Shipping Address" name="shipping_address">
                  <input type="text" placeholder="Shipping Mobile" name="shipping_mobile">
                  <input type="text" placeholder="Shipping City" name="shipping_city">
                  <input type="submit" style="color: red" class="btn btn-lg btn-info text-light" value="Submit">
                </form>
              </div>
            </div>
          </div>
             
        </div>
      </div>
    


    
    </div>
  </section>




@endsection