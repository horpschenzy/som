<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Dashboard | School of Ministry</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Admin - School of Ministry" name="description" />
        <meta content="SOTM" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('frontendassets/img/favicon.png')}}">
        {{-- <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontendassets/img/favicon.png')}}"> --}}

        <!-- Bootstrap Css -->
        @stack('extra-css')
        <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

    </head>


    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="colored"> -->
    <div id="layout-wrapper">
        <!-- Begin page -->
        @include('admin.panel.header')
        @include('admin.panel.sidebar')
        @yield('content')
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">

                <div class="rightbar-title d-flex align-items-center px-3 py-4">

                    <h5 class="m-0 me-2">Settings</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->


            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

         @include('admin.panel.footer')

    </div>

    @stack('scripts')

    </body>

</html>
