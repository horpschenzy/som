@extends('frontend.layouts.frontend')
@section('content')

<div class="breadcrumb-area">
    <div class="breadcrumb-top default-overlay bg-img pt-100 pb-95" style="background-image:url(assets/img/about-us.jpg);">
        <div class="container">
            <h2>About Us</h2>
            <p>Segun Obadje Teaching Ministries (SOTM) started in response to God’s mandate to His servants, Pastor Segun and Funke Obadje and the ministry has enjoyed increase in every facet with open doors within and outside Nigeria.</p>
        </div>
    </div>
</div>
<div class="achievement-area pt-130 pb-115">
    <div class="container">
        <div class="section-title mb-75">
            <h2>What <span>People Say</span></h2>
        </div>
       <div class="testimonial-slider-wrap mt-45">
            <div class="testimonial-text-slider">
                <div class="testi-content-wrap">
                    <div class="testi-big-img">
                        <img alt="" src="{{asset('frontendassets/img/SOMTestimonial.jpg')}}">
                    </div>
                   <div class="row no-gutters">
                       <div class="ml-auto col-lg-6 col-md-12">
                           <div class="testi-content bg-img default-overlay" style="background-image:url(assets/img/pcs.jpg);">
                                <div class="quote-style quote-left">
                                   <i class="fa fa-quote-left"></i>
                                </div>
                                    <p>SOM was an eye-opener to ministry for me; my mindset was completely renewed about ministry.</p>
                                    <p>I can’t forget one profound statement “THE CALL OF GOD is always unto increase”, another remarkable experience was the class on “Dynamics of the Anointing”, the impartation that day has not left me the same; I’ve been so conscious of the Anointing on me since then…</p>
                                    <p>If you are still contemplating: I want to encourage you to enroll NOW; believe me, your generation will thank you and bless God for your life because you opened up to this training.</p>
                                <div class="testi-info">
                                   <h5>JAYEOLA T.</h5>

                                </div>
                                <div class="quote-style quote-right">
                                   <i class="fa fa-quote-right"></i>
                                </div>
                                <div class="testi-arrow">
                                    <img alt="" src="assets/img/icon-img/testi-icon.png">
                                </div>
                           </div>
                       </div>
                   </div>
                </div>



            </div>
            <div class="testimonial-image-slider">
                <div class="sin-testi-image">
                    <img src="assets/img/anthony.jpg" alt="">
                </div>
                <div class="sin-testi-image">
                    <img src="assets/img/elsie.jpg" alt="">
                </div>
                <div class="sin-testi-image">
                    <img src="assets/img/jackson.jpg" alt="">
                </div>
                <div class="sin-testi-image">
                    <img src="assets/img/manuel.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="testimonial-text-img">
            <img alt="" src="assets/img/pcs.png">
        </div>
    </div>
</div>
@endsection

@push('scripts')




<!-- JS
============================================ -->

<!-- jQuery JS -->
<script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
<!-- Popper JS -->
<script src="assets/js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Plugins JS -->
<script src="assets/js/plugins.js"></script>
<!-- Ajax Mail -->
<script src="assets/js/ajax-mail.js"></script>
<!-- Main JS -->
<script src="assets/js/main.js"></script>


@endpush









