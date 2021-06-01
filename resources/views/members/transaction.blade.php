@extends('members.layouts.app')

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
                                        <th>Amount paid</th>
                                        <th>Balance</th>
                                        <th>Payment Due</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>17-03-2021</th>
                                        <td>Sisanmi</td>
                                        <td>Smith</td>
                                        <td>Installment</td>
                                        <td> 3,000</td>
                                        <td><span class="badge rounded-pill bg-danger">6,000</span></td>
                                        <td>24-06-2021</td>
                                        <td>
                                            <a href="#" class="btn btn-success">Paid</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>25-06-2021</th>
                                        <td>Sisanmi</td>
                                        <td>Smith</td>
                                        <td>Installment</td>
                                        <td> 3,000</td>
                                        <td><span class="badge rounded-pill bg-danger">3,000</span></td>
                                        <td>14-07-2021</td>
                                        <td>
                                            <a href="#" class="btn btn-primary">Pay Now</a>
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
