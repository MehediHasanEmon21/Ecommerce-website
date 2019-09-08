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

      
     
      <div class="review-payment">
        <h2>Review &amp; Payment</h2>
      </div>

      <div class="table-responsive cart_info">
      <table class="table table-condensed">
          <thead>
            <tr class="cart_menu">
              <td class="image">Item</td>
              <td class="description">Name</td>
              <td class="price">Price</td>
              <td class="quantity">Quantity</td>
              <td class="total">Total</td>
              <td></td>
            </tr>
          </thead>
          <tbody>
            
            @foreach($cart_products as $key=>$product)
            <tr>
              <td class="cart_product">
                <a href=""><img src="{{ URL::to($product->attributes->image) }}" width="80" height="80" alt=""></a>
              </td>
              <td class="cart_description">
                <h4><a href="">{{ $product->product_name }}</a></h4>
              </td>
              <td class="cart_price">
                <p> {{ $product->price }} TK</p>
              </td>
              <td class="cart_quantity">
                <div class="cart_quantity_button">
                
                  <form action="{{ route('cart.update',$product->id) }}" method="POST">
                    @csrf
                  <input class="cart_quantity_input" type="text" name="quantity" value=" {{ $product->quantity  }}" autocomplete="off" size="2">
                  <input type="submit" value="update" class="btn btn-sm btn-info">
                  </form>
                </div>
              </td>
              <td class="cart_total">
                <p class="cart_total_price">  {{ $product->getPriceSum() }} TK</p>
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href="{{ route('cart.delete',$product->id) }}"><i class="fa fa-times"></i></a>
              </td>
            </tr>
            @endforeach

             <tr>
              <td colspan="4">&nbsp;</td>
              <td colspan="2">
                <table class="table table-condensed total-result">
                  <tbody><tr>
                    <td>Cart Sub Total</td>
                    <td>{{ Cart::getSubTotal() }} TK</td>
                  </tr>
                  <tr>
                    <td>Exo Tax</td>
                    <td>0.00 TK</td>
                  </tr>
                  <tr class="shipping-cost">
                    <td>Shipping Cost</td>
                    <td>Free</td>                   
                  </tr>
                  <tr>
                    <td>Total</td>
                    <td><span>{{ Cart::getTotal() }} TK</span></td>
                  </tr>
                </tbody></table>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="payment-options text-center">
          <h2>Select Your Payment System</h2>
          <form action="{{ route('order.place') }}" method="POST">
            @csrf
          <span>
            <label><input type="radio" value="handcash" name="payment_gateway"> HandCash</label>
          </span>
          <br><br>
          <input type="submit" value="Done" class="btn btn-success">
          </form>
        </div>
    </div>
  </section>




@endsection


   