<header class="header-area">
    <div class="header-top bg-img">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7 col-12 col-sm-8">
                    <div class="header-contact">
                        <ul>
                            <li><i class="fa fa-phone"></i>08065686560</li>
                            <li><i class="fa fa-envelope-o"></i><a href="mailto:som@segunobadje.org"> som@segunobadje.org</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5 col-12 col-sm-4">
                    <div class="login-register">
                        <ul>
                            <li><a href="{{route('frontend.log-in')}}">Login</a></li>
                            <li><a href="{{route('frontend.register')}}">Register</a></li>
                            <li><a href="{{route('frontend.payment')}}">Pay for Course</a></li>
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
                        <a href="{{route('frontend.index')}}">
                            <img alt="" src="{{asset('frontendassets/img/logo2.png')}}" style="height: 40px;">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-6 col-8">
                    <div class="menu-cart-wrap">
                        <div class="main-menu">
                            <nav>
                                <ul>
                                    <li><a href="{{route('frontend.index')}}"> HOME </a></li>
                                    <li><a href="{{route('frontend.about')}}"> ABOUT  </a></li>
                                    <li><a href="{{route('frontend.courses')}}"> COURSES </a></li>
                                    <li><a href="{{route('frontend.contact')}}"> CONTACT </a></li>
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
