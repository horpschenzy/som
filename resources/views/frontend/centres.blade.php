@extends('frontend.layouts.frontend')
@section('content')
    <div class="breadcrumb-area">
        <div class="breadcrumb-top default-overlay bg-img pt-100 pb-95"
            style="background-image:url(assets/img/about-us.jpg);">
            <div class="container">
                <h2>E-Centres Addresses</h2>
                <p>Segun Obadje Teaching Ministries (SOTM) started in response to God’s mandate to His servants, Pastor
                    Segun and Funke Obadje and the ministry has enjoyed increase in every facet with open doors within and
                    outside Nigeria.</p>
            </div>
        </div>
    </div>
    <div class=" pt-130 pb-115">
        <div class="container">
            <div class="row col-md-12 ">
                <div class="table-responsive">
                    <table class="table table-bordered border-primary mb-0">
                        <thead class="">
                            <th>State</th>
                            <th>City</th>
                            <th>Address</th>
                            {{-- <th>Contact Person</th> --}}
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="2">Lagos State</td>
                                <td>Ikeja</td>
                                <td>142, Oba Akran Road, Ikeja Lagos</td>
                                {{-- <td>Minister Ope Olurotimi - 0803xxxxxx</td> --}}
                            </tr>
                            <tr>

                                <td>Lekki</td>
                                <td>Piccadilly Suites by SAMSUNG Office, Igbo-Efon Junction/Traffic Light, Lekki-Epe Express
                                    Road,Lekki</td>
                                {{-- <td>Pastor Moses - 0806 806 0169</td> --}}
                            </tr>

                            <tr>
                                <td>Oyo State</td>
                                <td>Ibadan</td>
                                <td>5, Agricola Street, Opposite U.I Second Gate, Ibadan, Oyo State</td>
                                {{-- <td>Minister Ope Olurotimi - 0803xxxxxx</td> --}}
                            </tr>
                            <tr>
                                <td rowspan="2">Osun State</td>
                                <td>Ile ife</td>
                                <td>GLT Avenue, Opposite Diganga Annex, Ife-Ibadan Expressway, Ile-Ife, Osun State</td>
                                {{-- <td>Minister Ope Olurotimi - 0803xxxxxx</td> --}}
                            </tr>
                            <tr>
                                <td>Osogbo</td>
                                <td>Yamah Plaza, Beside Akinola shopping complex Along Osogbo Grammar School Road, Osogbo
                                </td>
                            </tr>
                            <tr>
                                <td>Ondo State</td>
                                <td>Akure</td>
                                <td>4th Floor, Fisco House, Opposite NEPA Power House, Leo Junction, Akure</td>
                            </tr>
                        </tbody>
                    </table>


                </div>

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
    <script src="assets/js/main.js?version=1"></script>
@endpush
