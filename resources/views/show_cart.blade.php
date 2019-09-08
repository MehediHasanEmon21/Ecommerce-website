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
          <li class="active">Shopping Cart</li>
        </ol>
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
          </tbody>
        </table>
      </div>
    </div>
  </section>
  
  <div>
    <a class="btn btn-default update" style="background: red; color: white" href="{{ route('product.index')}}">Continue Shopping</a>
  </div>
  

  <section id="do_action">
    <div class="container">
      <div class="heading">
        <h3>What would you like to do next?</h3>
        <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
      </div>
      <div class="row">
      {{--   <div class="col-sm-6">
          <div class="chose_area">
            <ul class="user_option">
              <li>
                <input type="checkbox">
                <label>Use Coupon Code</label>
              </li>
              <li>
                <input type="checkbox">
                <label>Use Gift Voucher</label>
              </li>
              <li>
                <input type="checkbox">
                <label>Estimate Shipping &amp; Taxes</label>
              </li>
            </ul>
            <ul class="user_info">
              <li class="single_field">
                <label>Country:</label>
                <select>
                  <option>United States</option>
                  <option>Bangladesh</option>
                  <option>UK</option>
                  <option>India</option>
                  <option>Pakistan</option>
                  <option>Ucrane</option>
                  <option>Canada</option>
                  <option>Dubai</option>
                </select>
                
              </li>
              <li class="single_field">
                <label>Region / State:</label>
                <select>
                  <option>Select</option>
                  <option>Dhaka</option>
                  <option>London</option>
                  <option>Dillih</option>
                  <option>Lahore</option>
                  <option>Alaska</option>
                  <option>Canada</option>
                  <option>Dubai</option>
                </select>
              
              </li>
              <li class="single_field zip-field">
                <label>Zip Code:</label>
                <input type="text">
              </li>
            </ul>
            <a class="btn btn-default update" href="">Get Quotes</a>
            <a class="btn btn-default check_out" href="">Continue</a>
          </div>
        </div> --}}
        <div class="col-sm-12">
          <div class="total_area">
            <ul>
              <li>Cart Sub Total <span>{{ Cart::getSubTotal() }} TK</span></li>
              <li>Eco Tax <span>0.00 TK</span></li>
              <li>Shipping Cost <span>Free</span></li>
              <li>Total <span>{{ Cart::getTotal() }} TK</span></li>
            </ul>
              <a class="btn btn-default update" href="">Update</a>
               @php
                  $shipping_id = Session::get('shipping_id');
                  $customer_id = Session::get('customer_id');
               @endphp
              
               @if(isset($customer_id) && isset($shipping_id))

                    <a class="btn btn-default check_out" href="{{ route('payment.index') }}">Check Out</a>
               @elseif(isset($customer_id))

                    <a class="btn btn-default check_out" href="{{ route('checkout.index') }}">Check Out</a>
                @else
                    <a class="btn btn-default check_out" href="{{ route('login.check') }}">Check Out</a>
                @endif

          </div>
        </div>
      </div>
    </div>
  </section>




@endsection