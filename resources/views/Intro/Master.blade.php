<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('Intropage/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('Intropage/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('Intropage/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('Intropage/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('Intropage/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('Intropage/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('Intropage/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('Intropage/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('Intropage/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('Intropage/css/aos.css')}}">
    <!-- <link rel="stylesheet" href="{{ URL::asset('Intropage/css/style.css')}}"> -->
    <script src="{{ URL::asset('js/sweetalert.min.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
  <style type="text/css" media="screen">
      body{
        font-family: '微軟正黑體' !important;
      }
  </style>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    @include('Intro.Header')

    @yield('content')
    
    @include('Intro.Footer')
    
  </div> <!-- .site-wrap -->
<script>
  function loginRedirect(){
    window.location.href = "{{ route('login')}}";
  }
</script>
  <script src="{{ URL::asset('Intropage/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{ URL::asset('Intropage/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{ URL::asset('Intropage/js/jquery-ui.js')}}"></script>
  <script src="{{ URL::asset('Intropage/js/popper.min.js')}}"></script>
  <script src="{{ URL::asset('Intropage/js/bootstrap.min.js')}}"></script>
  <script src="{{ URL::asset('Intropage/js/owl.carousel.min.js')}}"></script>
  <script src="{{ URL::asset('Intropage/js/jquery.stellar.min.js')}}"></script>
  <script src="{{ URL::asset('Intropage/js/jquery.countdown.min.js')}}"></script>
  <script src="{{ URL::asset('Intropage/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{ URL::asset('Intropage/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{ URL::asset('Intropage/js/aos.js')}}"></script>
  <script src="{{ URL::asset('Intropage/js/jquery.fancybox.min.js')}}"></script>
  <script src="{{ URL::asset('Intropage/js/jquery.sticky.js')}}"></script>
  <script src="{{ URL::asset('Intropage/js/main.js')}}"></script>
  </body>
</html>