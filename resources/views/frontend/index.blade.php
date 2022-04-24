@extends('frontend.layouts.frontend')
@section('content')
    <div class="slider-area">
        <div class="slider-active owl-carousel">
            <div class="single-slider slider-height-1 bg-img"
                style="background-image:url({{ asset('frontendassets/img/SOMhomehero.jpg') }})">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-md-7 col-sm-12">
                            <div class="slider-content slider-animated-1 pt-230">
                                <h1 class="animated">Get Answers</h1>
                                <p class="animated text-uppercase" style="letter-spacing:6px ">Grow | Discover <br> Reach
                                    your
                                    Potentials
                                </p>
                                <div class="slider-btn">
                                    <a class="animated default-btn btn-green-color"
                                        href="{{ route('frontend.register') }}">Register</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="single-slider slider-height-1 bg-img" style="background-image:url({{asset('frontendassets/img/slide-4.jpg')}});">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-7 col-12 col-sm-12">
                        <div class="slider-content slider-animated-1 pt-230">
                            <h1 class="animated">GET ANSWERS</h1>
                            <p class="animated">Grow &nbsp; | &nbsp; Discover &nbsp; | &nbsp; Reach your Potentials </p>
                            <div class="slider-btn">
                                <a class="animated default-btn btn-green-color" href="about-us.html">ABOUT US</a>
                                <a class="animated default-btn btn-white-color" href="contact.html">CONTACT US</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    </div>
    <div class="about-us pt-130 pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="about-content">
                        <div class="section-title section-title-black mb-30">
                            <h2>About <span>Us</span></h2>
                            <p class="text-justify">School of Ministry is one of the platforms under the Outreach Arm of
                                Segun Obadje Teaching
                                Ministries. It is a New Creation Based Bible training Institute established for adequate
                                preparation of the saints for their God-given assignment.

                                SOTM School of Ministry (SOM) is a life transforming experience that redefines the
                                capabilities and boundaries available to one as a Christian and a minister of the gospel.

                                More so importantly, the teachings emphasized lessons that resounded beyond doctrinal
                                teachings that ministry is not for those who have been called to the Five-fold or pulpit
                                ministry but for everyone in every walk of life and endeavors.

                                SOTM School of Ministry in over a decade has been raising and empowering many people to Get
                                Answers, identify their God-ordained purpose whether in the four-walls of the church or
                                outside it, and to become outstanding in their pursuit of that purpose (Ephesians 4:12;
                                Hebrews 10:7).

                            </p>
                        </div>
                        <!--  <p>SOM is a word and spirit-based course. The courses offered are (MBC) Ministry Basic Course, (LME) Leadership and Ministry Ethics, (CMC) Church Management Course, (WEC) World Evangelization Course, (CGC) Church Growth Course as core courses while we have some electives course such as Project Writing and Presentation, Leadership, Delegation and Team Work,

                                                                                                Music, Media and Sound in Ministry: With Excellence as a Culture, Event Planning: Planning a Service and Starting a Leverage Fellowship

                                                                                                Our facilitators are well-trained and versatile ministers of the gospel with several and quality years of ministerial experience.

                                                                                                Our team of Facilitators is led by Pastor Segun and Funke Obadje.</p> -->
                        <div class="about-btn mt-45">
                            <a class="default-btn" href="{{ route('frontend.about') }}">READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="about-img">
                        <img src="{{ asset('frontendassets/img/SOM About.jpg') }}" alt="">
                        <a class="video-btn video-popup" href="https://www.youtube.com/watch?v=sv5hK4crIRc">
                            <img class="animated" src="{{ asset('frontendassets/img/icon-img/video.png') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="course-area bg-img pt-130 pb-10"
        style="background-image:url{{ asset('frontendassets/img/bg/bg-1.jpg') }};">
        <div class="container">
            <div class="section-title mb-75">
                <h2> <span>Our</span> Courses</h2>
                <p>What You Will Learn </p>
            </div>
            <div class="course-slider-active nav-style-1 owl-carousel">
                <div class="single-course">
                    <div class="course-img">
                        <a href="course-details.html"><img class="animated"
                                src="{{ asset('frontendassets/img/ministry_basic.jpg') }}" alt=""></a>
                        <span>MBC</span>
                    </div>
                    <div class="course-content">
                        <h4><a href="course-details.html">MINISTRY BASIC COURSE (MBC)</a></h4>
                    </div>
                    <div class="course-position-content">
                        <div class="credit-duration-wrap">
                            <div class="sin-credit-duration">
                                <i class="fa fa-diamond"></i>
                                <span>Credits : 125</span>
                            </div>
                            <div class="sin-credit-duration">
                                <i class="fa fa-clock-o"></i>
                                <span>Duration : 2 weeks</span>
                            </div>
                        </div>
                        <div class="course-btn">
                            <a class="default-btn" href="{{ route('frontend.register') }}">Register Now</a>
                        </div>
                    </div>
                </div>
                <div class="single-course">
                    <div class="course-img">
                        <a href="course-details.html"><img class="animated"
                                src="{{ asset('frontendassets/img/church-mgt.jpg') }}" alt=""></a>
                        <span>CMC</span>
                    </div>
                    <div class="course-content">
                        <h4><a href="course-details.html">CHURCH MANAGEMENT COURSE (CMC)</a></h4>
                    </div>
                    <div class="course-position-content">
                        <div class="credit-duration-wrap">
                            <div class="sin-credit-duration">
                                <i class="fa fa-diamond"></i>
                                <span>Credits : 125</span>
                            </div>
                            <div class="sin-credit-duration">
                                <i class="fa fa-clock-o"></i>
                                <span>Duration : 2 weeks</span>
                            </div>
                        </div>
                        <div class="course-btn">
                            <a class="default-btn" href="{{ route('frontend.register') }}">Register</a>
                        </div>
                    </div>
                </div>
                <div class="single-course">
                    <div class="course-img">
                        <a href="course-details.html"><img class="animated"
                                src="{{ asset('frontendassets/img/world-evangelism.jpg') }}" alt=""></a>
                        <span>WEC</span>
                    </div>
                    <div class="course-content">
                        <h4><a href="course-details.html">WORLD EVANGELIZATION COURSE (WEC)</a></h4>
                    </div>
                    <div class="course-position-content">
                        <div class="credit-duration-wrap">
                            <div class="sin-credit-duration">
                                <i class="fa fa-diamond"></i>
                                <span>Credits : 125</span>
                            </div>
                            <div class="sin-credit-duration">
                                <i class="fa fa-clock-o"></i>
                                <span>Duration : 2 weeks</span>
                            </div>
                        </div>
                        <div class="course-btn">
                            <a class="default-btn" href="{{ route('frontend.register') }}">Register</a>
                        </div>
                    </div>
                </div>
                <div class="single-course">
                    <div class="course-img">
                        <a href="course-details.html"><img class="animated"
                                src="{{ asset('frontendassets/img/leadership-and-ministry.jpg') }}" alt=""></a>
                        <span>LME</span>
                    </div>
                    <div class="course-content">
                        <h4><a href="course-details.html">LEADERSHIP AND MINISTRY ETHICS (LME)</a></h4>
                    </div>
                    <div class="course-position-content">
                        <div class="credit-duration-wrap">
                            <div class="sin-credit-duration">
                                <i class="fa fa-diamond"></i>
                                <span>Credits : 125</span>
                            </div>
                            <div class="sin-credit-duration">
                                <i class="fa fa-clock-o"></i>
                                <span>Duration : 2 weeks</span>
                            </div>
                        </div>
                        <div class="course-btn">
                            <a class="default-btn" href="{{ route('frontend.register') }}">Register</a>
                        </div>
                    </div>
                </div>
                <div class="single-course">
                    <div class="course-img">
                        <a href="course-details.html"><img class="animated"
                                src="{{ asset('frontendassets/img/course/course-2.jpg') }}" alt=""></a>
                        <span>CGC</span>
                    </div>
                    <div class="course-content">
                        <h4><a href="course-details.html">CHURCH GROWTH COURSE (CGC)</a></h4>
                    </div>
                    <div class="course-position-content">
                        <div class="credit-duration-wrap">
                            <div class="sin-credit-duration">
                                <i class="fa fa-diamond"></i>
                                <span>Credits : 125</span>
                            </div>
                            <div class="sin-credit-duration">
                                <i class="fa fa-clock-o"></i>
                                <span>Duration : 2 weeks</span>
                            </div>
                        </div>
                        <div class="course-btn">
                            <a class="default-btn" href="{{ route('frontend.register') }}">Register</a>
                        </div>
                    </div>
                </div>
                <div class="single-course">
                    <div class="course-img">
                        <a href="course-details.html"><img class="animated"
                                src="{{ asset('frontendassets/img/course/course-2.jpg') }}" alt=""></a>
                        <span>DAC</span>
                    </div>
                    <div class="course-content">
                        <h4><a href="course-details.html">DYNAMICS OF THE ANOINTING COURSE (DAC)</a></h4>
                    </div>
                    <div class="course-position-content">
                        <div class="credit-duration-wrap">
                            <div class="sin-credit-duration">
                                <i class="fa fa-diamond"></i>
                                <span>Credits : 125</span>
                            </div>
                            <div class="sin-credit-duration">
                                <i class="fa fa-clock-o"></i>
                                <span>Duration : 2 weeks</span>
                            </div>
                        </div>
                        <div class="course-btn">
                            <a class="default-btn" href="{{ route('frontend.register') }}">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="register-area bg-img default-overlay pt-130 pb-130" style="background-image:url({{asset('frontendassets/img/register.jpg')}});">
    <div class="container">
        <div class="section-title-2 mb-75 white-text">
            <h2>Register <span>Now</span></h2>
            <p> Admission Is Going On. Portal is now open for registration for  batch 2021.</p>
        </div>
        <div class="register-wrap">
            <div id="register-3" class="mouse-bg">
               <!--  <div class="winter-banner">
                    <img src="assets/img/banner/regi-1.png" alt="">
                    <div class="winter-content">
                        <span>WINTER </span>
                        <h3>2019</h3>
                        <span>ADMISSION </span>
                    </div>
                </div> -->
            </div>
            <div class="row">
                <div class="col-lg-10 col-md-8">
                    <div class="register-form">
                        <h4>Get A free Registration</h4>
                        <form>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="contact-form-style mb-20">
                                        <input name="name" placeholder="First Name" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="contact-form-style mb-20">
                                        <input name="name" placeholder="Last Name" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="contact-form-style mb-20">
                                        <input name="name" placeholder="Phone" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="contact-form-style mb-20">
                                        <input name="name" placeholder="Email" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="contact-form-style">
                                        <textarea name="message" placeholder="Message"></textarea>
                                        <button class="submit default-btn" type="submit">SUBMIT NOW</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="register-1" class="mouse-bg"></div>
    <div id="register-2" class="mouse-bg"></div>
</div> --}}
@endsection

@push('scripts')
    <!-- JS
                                                                        ============================================ -->
    <script src="https://apps.elfsight.com/p/platform.js" defer></script>

    <!-- jQuery JS -->
    <script src="{{ asset('frontendassets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!-- Popper JS -->
    <script src="{{ asset('frontendassets/js/popper.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('frontendassets/js/bootstrap.min.js') }}"></script>
    <!-- Plugins JS -->
    <script src="{{ asset('frontendassets/js/plugins.js') }}"></script>
    <!-- Ajax Mail -->
    <script src="{{ asset('frontendassets/js/ajax-mail.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('frontendassets/js/main.js') }}"></script>

    <style type="text/css">
        .single-count-without-border:before {
            position: absolute;
            top: 8px;
            background-color: #e1dddd;
            content: "";
            width: 0px !important;
            height: 0px !important;
        }

    </style>
@endpush
