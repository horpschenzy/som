<header class="header-area">
    <div class="header-top bg-img">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7 col-12 col-sm-8">
                    <div class="header-contact">
                        <ul>
                            <li><i class="fa fa-phone"></i>07087847070</li>
                            <li><i class="fa fa-envelope-o"></i><a href="mailto:som@segunobadje.org">
                                    som@segunobadje.org</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5 col-12 col-sm-4">
                    <div class="login-register" style="margin-top: -10px">
                        <ul>
                            @guest

                            <li><a href="{{route('frontend.log-in')}}">Login</a></li>
                            <li><a href="{{route('frontend.register')}}">Register</a></li>
                            <li><a href="{{route('frontend.payment')}}">Payment</a></li>
                            @else
                                @if (Auth::user()->user_type == \App\Interfaces\UserTypes::STUDENT)
                                    <li class="nav-item dashboard-btn"><a class="nav-link" role="button"
                                         href="{{ route('member.dashboard')}}">Dashboard</a></li>
                                @elseif(Auth::user()->user_type == \App\Interfaces\UserTypes::ADMIN)
                                    <li class="nav-item dashboard-btn"><a class="nav-link" role="button"
                                          href="{{ route('dashboard')}}">Admin Dashboard</a></li>
                                @elseif(Auth::user()->user_type == \App\Interfaces\UserTypes::SUPERVISOR)
                                          <li class="nav-item dashboard-btn"><a class="nav-link" role="button"
                                                href="{{ route('dashboard')}}">Supervisor Dashboard</a></li>
                                @endif


                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" style="color: #212529;" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
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
                            <img alt="SOTM" src="{{asset('frontendassets/img/sotmlogocolored.png')}}" style="height: 50px;">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-6 col-8" style="align-self: center;">
                    <div class="menu-cart-wrap">
                        <div class="main-menu">
                            <nav>
                                <ul>
                                    <li><a href="{{route('frontend.index')}}"> HOME </a></li>
                                    <li><a href="{{route('frontend.about')}}"> ABOUT </a></li>
                                    <li><a href="{{route('frontend.courses')}}"> COURSES </a></li>
                                    <li><a href="{{route('frontend.schedule')}}">STUDENT SCHEDULE </a></li>
                                    <li><a href="{{route('frontend.centres')}}"> E-CENTRES </a></li>
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
            <div class="mobile-menu-area" style="margin-top: -7px;">
                <div class="mobile-menu">
                    <nav id="mobile-menu-active">
                        <ul class="menu-overflow">
                            <li><a href="{{route('frontend.index')}}"> HOME </a></li>
                            <li><a href="{{route('frontend.about')}}"> ABOUT </a></li>
                            <li><a href="{{route('frontend.courses')}}"> COURSES </a></li>
                            <li><a href="{{route('frontend.contact')}}"> CONTACT </a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
