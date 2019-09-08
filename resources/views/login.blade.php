@extends('layouts.frontend.app')

@section('title','Login')

@section('slider')

@endsection

@section('sidebar')

@endsection

@section('content')



<section id="form"><!--form-->
    <div class="container">
      <div class="row">
       <div style="width: 50%; margin: 0 auto">
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
       </div>
        <div class="col-sm-4 col-sm-offset-1">
          <div class="login-form"><!--login form-->
             
            <h2>Login to your account</h2>
            <form action="{{ route('customer.login') }}" method="post">
              @csrf
              <input type="email" placeholder="Email" name="customer_email">
              <input type="password" placeholder="Password" name="customer_password">
              <span>
                <input type="checkbox" class="checkbox"> 
                Keep me signed in
              </span>
              <button type="submit" class="btn btn-default">Login</button>
            </form>
          </div><!--/login form-->
        </div>
        <div class="col-sm-1">
          <h2 class="or">OR</h2>
        </div>
        <div class="col-sm-4">
          <div class="signup-form"><!--sign up form-->
            <h2>New User Signup!</h2>
            <form action="{{ route('customer.registration') }}" method="POST">
              @csrf
              <input type="text" placeholder="Name" name="customer_name">
              <input type="email" placeholder="Email Address" name="customer_email">
              <input type="password" placeholder="Password" name="customer_password">
              <input type="text" placeholder="Phone" name="customer_phone">
              <button type="submit" class="btn btn-default">Signup</button>
            </form>
          </div><!--/sign up form-->
        </div>
      </div>
    </div>
</section>






@endsection