<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="msapplication-TileColor" content="#ff685c">
        <meta name="theme-color" content="#32cafe">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ asset('assets/images/favicon.ico')}}" type="{{ asset('assets/image/x-icon')}}"/>
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico')}}" />

        <!-- Title -->
        <title>@yield('title', config('app.name', 'Laravel'))</title>
        <link rel="stylesheet" href="{{ asset('assets/fonts/fonts/font-awesome.min.css')}}">

        <!-- Font Family -->
        <link href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,700" rel="stylesheet">

        <!-- Dashboard Css -->
        <link href="{{ asset('assets/css/dashboard.css')}}" rel="stylesheet" />

        <!-- Sidemenu Css -->
        <link href="{{ asset('assets/plugins/toggle-sidebar/sidemenu.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />

        <!---Font icons-->
        {{-- <link href="{{ asset('assets/plugins/iconfonts/plugin.css')}}" rel="stylesheet" /> --}}

    </head>

    @if(!@auth()->user())
        <body class="login-img">
    @else
        <body class="app sidebar-mini rtl">
    @endif

    @if(@auth()->user())
        <div id="global-loader" ></div>
        <div class="page">
            <div class="page-main">
                @include('backend.includes.header')
                <!-- Sidebar menu-->
                <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
                @include('backend.includes.sidebar')
                <div class="app-content  my-3 my-md-5">
                    @yield('content')
                    @include('backend.includes.footer')
                <!-- End Footer-->
                </div>
            </div>
        </div>
    @else
        @yield('content')
    @endif

        <!-- JavaScripts -->
        @yield('before-scripts')
            <!-- Dashboard js -->
        <script src="{{ asset('assets/js/vendors/jquery-3.2.1.min.js')}}"></script>
        <script src="{{ asset('assets/js/vendors/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('assets/js/vendors/selectize.min.js')}}"></script>
        <script src="{{ asset('assets/js/vendors/jquery.tablesorter.min.js')}}"></script>
        <!-- Data tables -->
        <script src="{{asset('assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/datatable.js')}}"></script>

        <!-- Fullside-menu Js-->
        <script src="{{ asset('assets/plugins/toggle-sidebar/sidemenu.js')}}"></script>

        <!-- Datepicker js -->
        <script src="{{ asset('assets/plugins/date-picker/spectrum.js')}}"></script>
        <script src="{{ asset('assets/plugins/date-picker/jquery-ui.js')}}"></script>
        <script src="{{ asset('assets/plugins/input-mask/jquery.maskedinput.js')}}"></script>

        <!-- Inline js -->
        <script src="{{ asset('assets/js/select2.js')}}"></script>
        <!-- Custom Js-->
        <script src="{{ asset('assets/js/custom.js')}}"></script>

        @yield('after-scripts')
    </body>

</html>