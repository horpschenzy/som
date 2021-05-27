<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SOTM'S School-of-Ministry</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontendassets/img/logo2.png')}}">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontendassets/css/bootstrap.min.css')}}">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ asset('frontendassets/css/icons.min.css')}}">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('frontendassets/css/plugins.css')}}">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('frontendassets/css/style.css')}}">
    <link href="{{ asset('backendassets/dist/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    <!-- Modernizer JS -->
    <script src="{{ asset('frontendassets/js/vendor/modernizr-2.8.3.min.js')}}"></script>

</head>
<body>

    @include('frontend.panel.header')

    @yield('content')

    @include('frontend.panel.footer')
</body>

</html>
