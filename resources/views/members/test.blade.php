@extends('members.layouts.app')

@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-body text-center">
                        <h3 class="card-title">Pre-Class Test</h3>
                        <p class="card-text">Without taking this test you cannot start the next class.
                        </p>
                        <a href="" class="btn btn-primary waves-effect waves-light">Start Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')

<!-- JAVASCRIPT -->
<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenu/metisMenu.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>

<!-- plugin js -->
<script src="assets/libs/moment/min/moment.min.js"></script>
<script src="assets/libs/jquery-ui-dist/jquery-ui.min.js"></script>

<!-- Calendar init -->

<script src="assets/js/app.js"></script>

@endpush
