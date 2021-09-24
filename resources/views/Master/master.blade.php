<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('img/icon.png') }}" />
    <link href="{{ URL::asset('Master/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('Master/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('Master/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('Master/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet"/>
    <link href="{{ URL::asset('Master/build/css/custom.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('Master/vendors/switchery/dist/switchery.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('Master/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="{{ URL::asset('js/sweetalert.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>

  </head>
<style type="text/css" media="screen">
    body{
        font-family: Microsoft JhengHei;
    }
</style>
  <body class="nav-md footer_fixed">
    @include('sweet::alert')
    <div class="container body">
      <div class="main_container">

        @include('Master.slidebar')

        @include('Master.top')

        <!-- page content -->

        <div class="right_col" role="main">
            <div class="row">
                <div class="clearfix"></div>
                    @yield('content')
                <div class="clearfix"></div>
            </div>
        </div>

        <!-- /page content -->

        @include('Master.footer')
      </div>
    </div>

    <script src="{{ URL::asset('Master/vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('Master/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('Master/vendors/fastclick/lib/fastclick.js') }}"></script>
    <script src="{{ URL::asset('Master/vendors/nprogress/nprogress.js') }}"></script>
    <script src="{{ URL::asset('Master/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ URL::asset('Master/build/js/custom.min.js') }}"></script>
    <script src="{{ URL::asset('Master/vendors/switchery/dist/switchery.min.js') }}"></script>
    <script src="{{ URL::asset('Master/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js') }}"></script>
    <script src="{{ URL::asset('Master/vendors/iCheck/icheck.min.js') }}"></script>
    <script src="{{ URL::asset('js/loadingoverlay.min.js') }}"></script>
  </body>
</html>
