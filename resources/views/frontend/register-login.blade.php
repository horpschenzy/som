@extends('frontend.layouts.frontend')
@section('content')

<div class="breadcrumb-area">
    <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-4 pt-50 pb-50" style="background-image:url(assets/img/grad-group.png);">
        <div class="container">
            <h2>Register</h2>
            <p style="width: 100%">We are called to reach the ends of the earth with the message of the new creation realities in Christ Jesus, stressing emphatically the integrity of God’s Word and communicating the healing presence and power of Jesus Christ to the whole world</p>
        </div>
    </div>
</div>
<div class="login-register-area pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    @include('frontend.inc.message')

                    <div class="tab-content">

                        </div>
                        <div id="lg2" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                     <form action="{{  route('frontend.store')}}" method="post">
                                        @csrf
                                        <input class="form-control" type="text" name="surname" placeholder="Surname" required value="{{old('surname')}}">
                                        <input class="form-control"  type="text" name="firstname" placeholder="Firstname" required  value="{{old('firstname')}}">
                                        <input class="form-control" type="number" name="phonenumber" placeholder="Phone number" required  value="{{old('phonenumber')}}">
                                        <input class="form-control" name="email" placeholder="Email" type="email" required  value="{{old('email')}}">
                                        <input class="form-control" name="password" placeholder="Password" type="password" required>
                                        <input class="form-control hidden" type="text" name="other_location" id="other_location" placeholder="City, Country" value="{{old('other_location')}}">
                                        <select class="form-control mb-4" name="centre" id="centre">
                                            <option disabled selected>Select your Preferred Centre</option>
                                            <option value="Ile-Ife">Ile Ife</option>
                                            <option value="Lekki">Lekki Lagos</option>
                                            <option value="ikeja">Ikeja Lagos</option>
                                            <option value="Agricola">Agricola Ibadan</option>
                                            <option value="Akure">Akure</option>
                                            <option value="Ondo">Ondo</option>
                                            <option value="Osogbo">Osogbo</option>
                                            <option value="Others">Others</option>
                                        </select>

                                        <select name="paymenttype" class="form-control mb-4" id="payment-type">
                                            <option value="oneoff">One-Off</option>
                                            <option value="installment">Installment</option>
                                        </select>
                                        <select class="custom-select mb-10" name="payment">
                                            <option value="800000">&#8358;8,000</option>
                                        </select>

                                        <div class="button-box mt-5">
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














