<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="keyword" content="" />
    <meta name="author" content="flexilecode" />
    <!--! The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags !-->
    <!--! BEGIN: Apps Title-->
    <title>Cafe Management || Dashboard</title>
    <!--! END:  Apps Title-->
    <!--! BEGIN: Favicon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico')}}" />
    <!--! END: Favicon-->
    <!--! BEGIN: Bootstrap CSS-->
    @yield('css-script')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css')}}" />
    <!--! END: Bootstrap CSS-->
    <!--! BEGIN: Vendors CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/vendors.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/daterangepicker.min.css')}}" />
    <!--! END: Vendors CSS-->
    <!--! BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme.min.css')}}" />
    <!--! END: Custom CSS-->
    <!--! HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries !-->
    <!--! WARNING: Respond.js doesn"t work if you view the page via file: !-->
    <!--[if lt IE 9]>
   <script src="https:oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
   <script src="https:oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>
    {{-- navbar --}}
    @include('admin.components.navbar')
    {{-- sidebar / header --}}
    @include('admin.components.header')
    {{-- Main container --}}
    <main class="nxl-container">
        {{-- content --}}
        @yield('dashboard')
        @yield('permissions')
        @yield('roles')

        {{-- footer --}}
        @include('admin.components.footer')
    </main>

    {{-- theme-customizer --}}
    @include('admin.components.theme-customizer')

    @include('sweetalert::alert')

    <!--! ================================================================ !-->
    <!--! Footer Script !-->
    <!--! ================================================================ !-->
    @yield('script')
    <!--! BEGIN: Vendors JS !-->
    <script src="{{ asset('assets/vendors/js/vendors.min.js')}}"></script>
    <!-- vendors.min.js {always must need to be top} -->
    <script src="{{ asset('assets/vendors/js/daterangepicker.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/js/apexcharts.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/js/circle-progress.min.js')}}"></script>
    <!--! END: Vendors JS !-->
    <!--! BEGIN: Apps Init  !-->
    <script src="{{ asset('assets/js/common-init.min.js')}}"></script>
    <script src="{{ asset('assets/js/dashboard-init.min.js')}}"></script>
    <!--! END: Apps Init !-->
    <!--! BEGIN: Theme Customizer  !-->
    <script src="{{ asset('assets/js/theme-customizer-init.min.js')}}"></script>
    <!--! END: Theme Customizer !-->
</body>

</html>
