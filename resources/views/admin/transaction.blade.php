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
                                        <th>Transaction ID</th>
                                        <th>Payment Status</th>
                                        <th>Email</th>
                                        <th>Gateway Response</th>
                                        <th>Payment Channel</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Description</th>
                                        <th>Currnecy</th>
                                        <th>Amount</th>
                                        <th>Balance</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>17-03-2021</td>
                                        <td>2343489009FG</td>
                                        <td><span class="badge rounded-pill bg-success">successful</span></td>
                                        <td>sisanmi.smith@gmail.com</td>
                                        <td>open</td>
                                        <td>Card payment</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>One-Off</td>
                                        <td>NGN</td>
                                        <td> 8,000</td>

                                        <td>none</td>
                                        <td>
                                            <a href="#" class="btn btn-primary">Review</a>
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
<script src="{{ asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('assets/libs/jquery-sparkline/jquery.sparkline.min.js')}}"></script>



<!-- plugin js -->
<script src="{{ asset('assets/libs/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('assets/libs/jquery-ui-dist/jquery-ui.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('assets/js/app.js')}}"></script>


@endpush
