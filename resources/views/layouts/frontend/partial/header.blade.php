<header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{ route('home') }}"><img src="{{ asset('public/assets/frontend/images/home/logo.png') }}" alt="" /></a>
                        </div>
                  
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-user"></i> Account</a></li>
                                @php
                                $shipping_id = Session::get('shipping_id');
                                $customer_id = Session::get('customer_id');
                                
                                @endphp

                                @if($customer_id != NULL && $shipping_id != NULL)
                                    <li><a href="{{ route('payment.index') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                @elseif($customer_id != NULL)
                                    <li><a href="{{ route('checkout.index') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                @else
                                   <li><a href="{{ route('login.check') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                @endif

                                @if($customer_id)
                                <li><a href="{{ route('cart.show') }}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                @endif
                               

                                @if(isset($customer_id))
                                    <li><a href="{{ route('customer.logout') }}"><i class="fa fa-lock"></i> Logout</a></li>
                                @else
                                    <li><a href="{{ route('login.check') }}"><i class="fa fa-lock"></i> Login</a></li>
                                @endif
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{ route('home') }}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a></li>
                                <li><a href="{{ route('product.index') }}" class="{{ Request::is('products') ? 'active' : '' }}">Products</a></li>
                                @if($customer_id)
                                <li><a href="{{ route('cart.show') }}" class="{{ Request::is('show-cart') ? 'active' : '' }}">Cart</a></li>
                                @endif
                                <li><a href="{{ route('contact.index') }}" class="{{ Request::is('contact') ? 'active' : '' }}">Contact</a></li>
                                
                                 @if(isset($customer_id))
                                    <li><a href="{{ route('customer.logout') }}">Logout</a></li>
                                @else
                                    <li><a href="{{ route('login.check') }}" class="{{ Request::is('login-check') ? 'active' : '' }}">Login</a></li>
                                @endif

                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->