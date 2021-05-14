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
    <!-- Modernizer JS -->
    <script src="{{ asset('frontendassets/js/vendor/modernizr-2.8.3.min.js')}}"></script>

    <style type="text/css">
        flex-box {
            display: flex;
            flex-wrap: wrap;
        }

        .card {
            position: relative;
            top: 10px;
            height: 300px;
        }

        .pay {
            color: #ffffff;
            position: relative;
            top: 150px;
            left: 100px;
            width: 100px;
            background-color: #33B773;
        }
        .pay a{
            margin: 2px;
        }
        .onetime{
            text-align: center;
        }

        label{
            width: 100px;
            margin-left: 5px;
        }
        .form{
        width: 300px;
        display: block;
        margin-left: 10px;
        background: transparent;
        font-size: 20px;
        color: #333;
        height: 40px;
        }


        </style>
</head>
<body>

    @include('frontend.panel.header')

    @yield('content')


</body>

</html>
