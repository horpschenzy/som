@extends('admin.layouts.app')

@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Payment for School of Ministry</h4>
                       <p class="card-title-desc">All payments must be made before 29th of June.</p>

                        <div class="table-responsive">
                            <table class="table table-bordered border-primary mb-0">

                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>Balance</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>17-03-2021</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>One-Off</td>
                                        <td> 8,000</td>
                                        <td>none</td>
                                        <td>
                                            <a href="#" class="btn btn-primary">Payment</a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

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
