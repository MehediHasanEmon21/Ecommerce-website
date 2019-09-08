<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    
    <link id="bootstrap-style" href="{{ asset('public/assets/backend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/backend/css/bootstrap-responsive.min.css') }}" rel="stylesheet">
    <link id="base-style" href="{{ asset('public/assets/backend/css/style.css') }}" rel="stylesheet">
    <link id="base-style-responsive" href="{{ asset('public/assets/backend/css/style-responsive.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
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

    @stack('css')
    
</head>
<body>
            <!-- start: Header -->
@include('layouts.backend.partial.topbar')
            <!-- start: Header -->

<div class="container-fluid-full">
    <div class="row-fluid">

        <!-- start: Main Menu -->
        @include('layouts.backend.partial.sidebar')
        <!-- end: Main Menu -->

        <noscript>
            <div class="alert alert-block span10">
                <h4 class="alert-heading">Warning!</h4>
                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
            </div>
        </noscript>

        <!-- start: Content -->
        @yield('content')

        <!-- end: Content -->
    </div><!--/#content.span10-->
</div><!--/fluid-row-->


<div class="clearfix"></div>
@include('layouts.backend.partial.footer')
  

        <script src="{{ asset('public/assets/backend/js/jquery-1.9.1.min.js') }}"></script>
        <script src="{{ asset('public/assets/backend/js/jquery-migrate-1.0.0.min.js') }}"></script>
    
        <script src="{{ asset('public/assets/backend/js/jquery-ui-1.10.0.custom.min.js') }}"></script>
    
        <script src="{{ asset('public/assets/backend/js/jquery.ui.touch-punch.js') }}"></script>
    
        <script src="{{ asset('public/assets/backend/js/modernizr.js') }}"></script>
    
        <script src="{{ asset('public/assets/backend/js/bootstrap.min.js') }}"></script>
    
        <script src="{{ asset('public/assets/backend/js/jquery.cookie.js') }}"></script>
    
        <script src='{{ asset('public/assets/backend/js/fullcalendar.min.js') }}'></script>
    
        <script src='{{ asset('public/assets/backend/js/jquery.dataTables.min.js')}}'></script>

        <script src="{{ asset('public/assets/backend/js/excanvas.js') }}"></script>
        <script src="{{ asset('public/assets/backend/js/jquery.flot.js') }}"></script>
        <script src="{{ asset('public/assets/backend/js/jquery.flot.pie.js') }}"></script>
        <script src="{{ asset('public/assets/backend/js/jquery.flot.stack.js') }}"></script>
        <script src="{{ asset('public/assets/backend/js/jquery.flot.resize.min.js') }}"></script>
    
        <script src="{{ asset('public/assets/backend/js/jquery.chosen.min.js') }}"></script>
    
        <script src="{{ asset('public/assets/backend/js/jquery.uniform.min.js') }}"></script>
        
        <script src="{{ asset('public/assets/backend/js/jquery.cleditor.min.js') }}"></script>
    
        <script src="{{ asset('public/assets/backend/js/jquery.noty.js') }}"></script>
    
        <script src="{{ asset('public/assets/backend/js/jquery.elfinder.min.js') }}"></script>
    
        <script src="{{ asset('public/assets/backend/js/jquery.raty.min.js') }}"></script>
    
        <script src="{{ asset('public/assets/backend/js/jquery.iphone.toggle.js')}}"></script>
    
        <script src="{{ asset('public/assets/backend/js/jquery.uploadify-3.1.min.js')}}"></script>
    
        <script src="{{ asset('public/assets/backend/js/jquery.gritter.min.js') }}"></script>
    
        <script src="{{ asset('public/assets/backend/js/jquery.imagesloaded.js') }}"></script>
    
        <script src="{{ asset('public/assets/backend/js/jquery.masonry.min.js') }}"></script>
    
        <script src="{{ asset('public/assets/backend/js/jquery.knob.modified.js') }}"></script>
    
        <script src="{{ asset('public/assets/backend/js/jquery.sparkline.min.js') }}"></script>
    
        <script src="{{ asset('public/assets/backend/js/counter.js') }}"></script>
    
        <script src="{{ asset('public/assets/backend/js/retina.js') }}"></script>

        <script src="{{ asset('public/assets/backend/js/custom.js') }}"></script>

        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
        
        
        <script>  
         $(document).on("click", "#delete", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to delete?",
                  text: "Once Delete, This will be Permanently Delete!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Safe Data!");
                  }
                });
            });
      </script>

        
    @stack('js')
    {!! Toastr::message() !!}
</body> 
</html>
