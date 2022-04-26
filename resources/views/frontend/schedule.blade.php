@extends('frontend.layouts.frontend')
@section('content')

<div class="breadcrumb-area">
    <div class="breadcrumb-top default-overlay bg-img pt-100 pb-95"
        style="background-image:url(assets/img/about-us.jpg);">
        <div class="container">
            <h2>School Schedule</h2>
            <p>Segun Obadje Teaching Ministries (SOTM) started in response to God’s mandate to His servants, Pastor
                Segun and Funke Obadje and the ministry has enjoyed increase in every facet with open doors within and
                outside Nigeria.</p>
        </div>
    </div>
</div>
<div class=" pt-50 pb-115">
    <div class="container">
        <div class="row mb-4">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body mt-n3 d-grid">
                        <div class="">
                            
                            <div class="">
                                @include('frontend.inc.schedule-left')
                            </div>





                        </div>
                    </div>
                </div>
            </div>
            <!-- end col-->

            <div class="col-xl-8">
                <div class="card mt-4 mt-xl-0 mb-0">
                    <div class="card">
                        <div class="">
                            <div class="table-responsive">
                                @include('frontend.inc.schedule-right')
                                
                            </div>

                        </div>
                    </div>
                </div>
            </div> <!-- end col -->

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