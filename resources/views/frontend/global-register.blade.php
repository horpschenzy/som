@extends('frontend.layouts.frontend')
@section('content')

<div class="breadcrumb-area">
    <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-4 pt-100 pb-95" style="background-image:url(assets/img/grad-group.png);">
        <div class="container">
            <h2>Register</h2>
            <p>We are called to reach the ends of the earth with the message of the new creation realities in Christ Jesus, stressing emphatically the integrity of God’s Word and communicating the healing presence and power of Jesus Christ to the whole world</p>
        </div>
    </div>
</div>
<div class="login-register-area pt-130 pb-130">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg2">
                            <h4> Global </h4>
                        </a>
                        <a  href="{{route('frontend.register')}}">
                            <h4> Nigeria </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane ">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="#" method="post">
                                        <input type="text" name="user-name" placeholder="Username">
                                        <input type="password" name="user-password" placeholder="Password">
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <input type="checkbox">
                                                <label>Remember me</label>
                                                <a href="#">Forgot Password?</a>
                                            </div>
                                            <button class="default-btn" type="submit"><span>Login</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="lg2" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="/globalregister" method="post">
                                        @csrf
                                        <input class="form-control" type="text" name="surname" placeholder="Surname">
                                        <input class="form-control"  type="text" name="firstname" placeholder="Firstname">
                                        <input class="form-control" type="text" name="phonenumber" placeholder="Phonenumber">
                                        <input class="form-control" name="user-email" placeholder="Email" type="email">
                                        <input class="form-control" type="text" name="church" placeholder="Your Church">
                                        <input class="form-control" type="text" name="state" placeholder="Your State">
                                        {{-- <select class="form-control mb-3" name="centre" id="">
                                            <option value="null">Select your Preferred Centre</option>
                                            <option value="Ile-Ife">Ile Ife</option>
                                            <option value="Lekki">Lekki Lagos</option>
                                            <option value="ikeja">Ikeja Lagos</option>
                                            <option value="Agricola">Agricola Ibadan</option>
                                            <option value="Akure">Akure</option>
                                            <option value="Ondo">Ondo</option>
                                            <option value="Osogbo">Osogbo</option>
                                        </select> --}}

                                        <select class="form-control mb-3" name="payment" id="">
                                            <option value="20">One off $20</option>
                                        </select>
                                        <div class="button-box">
                                            <button class="default-btn" type="submit"><span>Register</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="register-area bg-img pt-130 pb-130">
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
<!-- jQuery JS -->
<script src="{{asset('frontendassets/js/vendor/jquery-1.12.4.min.js')}}"></script>
<!-- Popper JS -->
<script src="{{asset('frontendassets/js/popper.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('frontendassets/js/bootstrap.min.js')}}"></script>
<!-- Plugins JS -->
<script src="{{asset('frontendassets/js/plugins.js')}}"></script>
<!-- Ajax Mail -->
<script src="{{asset('frontendassets/js/ajax-mail.js')}}"></script>
<!-- Main JS -->
<script src="{{asset('frontendassets/js/main.js')}}"></script>


@endpush














