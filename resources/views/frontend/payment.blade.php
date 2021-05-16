@extends('frontend.layouts.frontend')
@section('content')

<div class="login-register-area pt-130 pb-130">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="tab-content">

                        <div id="lg2" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                                        <div class="row" style="margin-bottom:40px;">
                                            <div class="col-md-8 col-md-offset-2">
                                                <p>
                                                    {{-- <div>
                                                        <h5>Thank you</h5>
                                                        Registration fee:
                                                    </div> --}}
                                                </p>

                                                <input type="email" class="form-control" name="email" placeholder="Your Email"> {{-- required --}}
                                                <label>Amount</label>
                                                <select class="form-control mb-3" name="amount" id="">
                                                    <option disabled selected> Payment Option (One-off OR Installment)</option>
                                                    <option value="800000">One off &#8358;8,000</option>
                                                    <option value="600000">Two Payments (&#8358;3,000 & &#8358;6,000)</option>
                                                    <option value="300000">Three Payments &#8358;3,000</option>
                                                </select>{{-- required in kobo --}}
                                                <input type="hidden" name="quantity" value="1">
                                                <input type="hidden" name="currency" value="NGN">
                                                <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value', 'key_name' => 'value',]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                                                <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                                                {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

                                                <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}

                                                <p>
                                                    <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                                                        <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                                                    </button>
                                                </p>
                                            </div>
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

<script>

let selection = document.querySelector('select');
let amount = document.querySelector('label');


selection.addEventlisterner('change', () => {
	amount.innerText = selection.options[selection.selectedIndex].text;
});

</script>


@endpush














