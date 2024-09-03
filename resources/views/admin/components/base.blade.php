<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="keyword" content="" />
    <meta name="author" content="flexilecode" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--! The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags !-->
    <!--! BEGIN: Apps Title-->
    <title>Admin BukuSaku-v2 || Dashboard</title>
    <!--! END:  Apps Title-->
    <!--! BEGIN: Favicon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/smktelkomnew.png')}}" />
    <!--! END: Favicon-->
    <!--! BEGIN: Bootstrap CSS-->
    @yield('css-script')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css')}}" />
    <!--! END: Bootstrap CSS-->
    <!--! BEGIN: Vendors CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/vendors.min.css')}}" />
    <!--! END: Vendors CSS-->
    <!--! BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/select2-theme.min.css')}}">
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        .nxl-container {
            min-height: 100%; /* Make main container take min height of 100% */
            display: flex;
            flex-direction: column;
        }
        footer { /* Assuming you have footer inside .footer or use correct selector */
            margin-top: auto; /* Push footer to the bottom */
        }
    </style>
    <!--! END: Custom CSS-->
    <!--! HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries !-->
    <!--! WARNING: Respond.js doesn"t work if you view the page via file: !-->
    <!--[if lt IE 9]>
   <script src="https:oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
   <script src="https:oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<!-- Taruh sebelum penutupan <body> -->
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
        @yield('content')

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
    <script src="{{ asset('assets/vendors/js/select2.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/js/select2-active.min.js')}}"></script>
    <!--! END: Vendors JS !-->
    <!--! BEGIN: Apps Init  !-->
    <script src="{{ asset('assets/js/common-init.min.js')}}"></script>
    <script src="{{ asset('assets/js/dashboard-init.min.js')}}"></script>
    <!--! END: Apps Init !-->
    <!--! BEGIN: Theme Customizer  !-->
    <script src="{{ asset('assets/js/theme-customizer-init.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <!--! END: Theme Customizer !-->
</body>

</html>
