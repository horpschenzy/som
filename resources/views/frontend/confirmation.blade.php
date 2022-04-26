@extends('frontend.layouts.frontend')
@section('content')

<div class="breadcrumb-area">
    <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-4 pt-100 pb-95" style="background-image:url(assets/img/grad-group.png);">
        <div class="container">
            <h2>Payment Details</h2>
            <p>Kindly make payment using the following account details details</p>
        </div>
    </div>
</div>
<div class="login-register-area pt-130 pb-130">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <li> <strong>Account Name:</strong>  Segun Obadje Teaching Ministry</li>
                    <li> <strong>Account Number:</strong>  0619851201</li>
                    <li> <strong>Bank:</strong> GTBank</li>
                    <li><strong>Currency:</strong> USD</li>
                    <hr>
                    <h3>Send a (WhatsApp) message with your Full name, email address & proof of payment to +2348065686560</h3>
                    <p>Kindly await a confirmation message</p>


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
<script src="{{asset('frontendassets/js/main.js?version=1')}}"></script>


@endpush














