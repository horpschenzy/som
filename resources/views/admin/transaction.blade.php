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

                        <div class="table">
                            <table id="datatable-buttons" class="table table-bordered border-primary mb-0">

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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments as $data)
                                    <tr>
                                        <td>{{$data->paid_at}}</td>
                                        <td>{{ $data->transactionId}}</td>
                                        <td><span class="badge rounded-pill bg-success">{{ isset( $data->status ) ? 'Success' : 'Failed' }}</span></td>
                                        <td>{{ $data->customeremail}}</td>
                                        <td>{{ $data->gateway_response}}</td>
                                        <td>{{ $data->channel}}</td>
                                        <td>{{ $data->firstname }}</td>
                                        <td>{{ $data->surname}}</td>
                                        <td>{{ $data->description }}</td>
                                        <td>{{ $data->currency }}</td>
                                        <td>{{ $data->requested_amount / 100 }}</td>
                                    </tr>
                                    @endforeach

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

<!-- Required datatable js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/jszip/jszip.min.js"></script>
<script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="assets/js/pages/datatables.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>



@endpush
