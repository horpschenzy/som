@extends('frontend.layouts.pay')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-4 colsm-12">
            <img src="assets/img/slide-1.jpg" style="width: 350px; height: 200px;">
            <p style="font-size: 20px;"><strong>A six-week intensive bible training program,</strong>  where the word of God is taught extensively, SOM is where you will learn ministry basics and learn to fulfill your God given purpose.</p>

        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="flex-box">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <h1 class="donate">Make Payment</h1>
                    </div>
                    <div class="col-lg-4 co-md-4 col-sm-6">
                            <select>
                                <option value="usd" selected> USD  $</option>
                                <option value="ngn"> NGN  &#8358;</option>
                            </select>
                    </div>
                    </div>
                    <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="card">
                                <h2 class="onetime">ONE TIME</h2>
                                        <div class="form text-center mt-5 mb-0">
                                        <label class="radio-inline"><input type="radio" name="optradio">&#8358;8000</label>
                                    </div>
                                    <div class="text-center">
                                        <a href="" class="btn btn-success mr-2 mt-2">Proceed to pay</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="card">
                                    <h2 class="onetime">INSTALLMENT</h2>
                                    <div class="form">
                                        <label class="radio-inline"><input type="radio" name="optradio">&#8358;3,000</label>
                                        <label class="radio-inline"><input type="radio" name="optradio">&#8358;4,000</label>
                                        <label class="radio-inline"><input type="radio" name="optradio">&#8358;6000</label>

                                        <hr>
                                     <h5 class="ml-2">Other Amount</h5>
                                      <input type="number" class="form" id="amt" name="amount" placeholder="&#8358;">
                                    </div>
                                    <div class="pay">
                                        <a href="">Proceed to pay</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

@endpush



{{-- <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SOTM'S School-of-Ministry</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo2.png">
    <!-- CSS
	============================================ -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Icon Font CSS -->
    <!-- Plugins CSS -->
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Modernizer JS -->

</head>
<body>
    <header class="header-area">
        <div class="header-top bg-img">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7 col-12 col-sm-8">
                        <div class="header-contact">
                            <ul>
                                <li><i class="fa fa-phone"></i> 07034635093</li>
                            <li><i class="fa fa-envelope-o"></i><a href="#">gltlekki@glt.church</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5 col-12 col-sm-4">
                        <div class="login-register">
                            <ul>
                                <li><a href="login-register.html">Login</a></li>
                                <li><a href="login-register.html">Register</a></li>
                                <li><a href="index.html">Back to Home</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom sticky-bar clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-6 col-4">
                        <div class="logo">
                            <a href="index.html">
                                <img alt="" src="assets/img/logo2.png" style="width: 80px; height: 40px;">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-6 col-8">
                        <div class="menu-cart-wrap">
                            <div class="main-menu">
                                <nav>
                                    <ul>
                                        <li><a href="index.html"> HOME </a></li>
                                        <li><a href="about-us.html"> ABOUT </a></li>
                                        <li><a href="course.html"> COURSES </a></li>
                                        <li><a href="contact.html"> CONTACT </a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="cart-search-wrap">
                                <div class="header-search">
                                    <button class="search-toggle">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <div class="search-content">
                                        <form action="#">
                                            <input type="text" placeholder="Search">
                                            <button>
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mobile-menu-area">
                    <div class="mobile-menu">
                        <nav id="mobile-menu-active">
                            <ul class="menu-overflow">
                                <li><a href="index.html">HOME</a></li>
                                <li><a href="about-us.html">About</a></li>
                                <li><a href="course.html"> COURSES </a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

</body>
</html> --}}
