

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from bootstrapmaster.com/live/metro/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2018 16:57:00 GMT -->
<head>
    
    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="description" content="Metro Admin Template.">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <!-- end: Meta -->
    
    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->
    
    <!-- start: CSS -->
    <link id="bootstrap-style" href="{{ asset('public/assets/backend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/backend/css/bootstrap-responsive.min.css') }}" rel="stylesheet">
    <link id="base-style" href="{{ asset('public/assets/backend/css/style.css') }}" rel="stylesheet">
    <link id="base-style-responsive" href="{{ asset('public/assets/backend/css/style-responsive.css') }}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <!-- end: CSS -->
    

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <link id="ie-style" href="css/ie.css" rel="stylesheet">
    <![endif]-->
    
    <!--[if IE 9]>
        <link id="ie9style" href="css/ie9.css" rel="stylesheet">
    <![endif]-->
        
    <!-- start: Favicon -->
    <link rel="shortcut icon" href="{{ asset('public/assets/backend/img/favicon.ico') }}">
    <!-- end: Favicon -->
    
            <style type="text/css">
            body { background: url({{ asset('public/assets/backend/img/bg-login.jpg') }}) !important; }
        </style>
        
        
        
</head>

<body>
        <div class="container-fluid-full">
        <div class="row-fluid">
                    
            <div class="row-fluid">
                <div class="login-box">
                    <div class="icons">
                        <a href="index.html"><i class="halflings-icon home"></i></a>
                        <a href="#"><i class="halflings-icon cog"></i></a>
                    </div>
                    <h2>Login to your account</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <fieldset>
                            
                            <div class="input-prepend" title="Username">
                                <span class="add-on"><i class="halflings-icon user"></i></span>
                                <input class="input-large span10 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" type="email" placeholder="type email" value="{{ old('email') }}" required autofocus/>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="clearfix"></div>

                            <div class="input-prepend" title="Password">
                                <span class="add-on"><i class="halflings-icon lock"></i></span>
                                <input class="input-large span10 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" type="password" placeholder="type password" required/>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="clearfix"></div>
                            
                            <label class="remember" for="remember"><input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />Remember me</label>

                            <div class="button-login">  
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                            <div class="clearfix"></div>
                    </form>
                    <hr>
                    <h3>Forgot Password?</h3>
                    <p>
                        No problem, <a href="#">click here</a> to get a new password.
                    </p>    
                </div><!--/span-->
            </div><!--/row-->
            

    </div><!--/.fluid-container-->
    
        </div><!--/fluid-row-->
    
    <!-- start: JavaScript-->

        <script src="{{ asset('public/assets/backend/js/jquery-1.9.1.min.js') }}"></script>
        <script src="{{ asset('public/assets/backend/js/jquery-migrate-1.0.0.min.js') }}"></script>
    
        <script src="{{ asset('public/assets/backend/js/jquery-ui-1.10.0.custom.min.js') }}"></script>
    
        <script src="{{ asset('public/assets/backend/js/jquery.ui.touch-punch.js') }}"></script>
    
        <script src="{{ asset('public/assets/backend/js/modernizr.js') }}"></script>
    
        <script src="{{ asset('public/assets/backend/js/bootstrap.min.js') }}"></script>
    
  

        <script src="{{ asset('public/assets/backend/js/custom.js') }}"></script>
    <!-- end: JavaScript-->
    
</body>

<!-- Mirrored from bootstrapmaster.com/live/metro/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2018 16:57:01 GMT -->
</html>






{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}















