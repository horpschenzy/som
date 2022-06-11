@extends('admin.layouts.app')
@push('extra-css')
<!-- DataTables -->
<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

@endpush

@section('content')
 <!-- account setting page start -->


<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title-box">
                        <h4>SOM Registered Students</h4>
                            <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li> --}}
                                <li class="breadcrumb-item active">Registered Students</li>
                            </ol>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('flash')
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Other Name</th>
                                        {{-- <th>Reg Number</th> --}}
                                        <th>Phone Numnber</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Gender</th>
                                        <th>Born Again</th>
                                        <th>Born Again Year</th>
                                        <th>Spirit Filled</th>
                                        <th>Church</th>
                                        <th>Reason</th>
                                        <th>Expectation</th>
                                       <th>Center</th>
                                        <th>Address</th>
                                        <th>Payment</th>
                                        <th>Payment Type</th>
                                        <th>Total Payment Made</th>
                                        <th>Region</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($members as $member)
                                    <tr>
                                        <td>
                                            <img src="images/{{ $member->profile_picture}}" alt="user-image" class="avatar-xs me-2 rounded-circle" />
                                            </td>
                                        <td>{{$member->surname}}</td>
                                        <td>{{$member->firstname}}</td>
                                        <td>{{$member->othername}}</td>
                                        {{-- <td>{{ $member->reg_no}}</td> --}}
                                        <td>{{$member->phonenumber}}</td>
                                        <td>{{$member->email}}</td>
                                        <td>{{$member->marital_status}}</td>
                                        <td>{{$member->gender}}</td>
                                        <td>{{($member->is_born_again) ? 'Yes':' No'}}</td>
                                        <td>{{ $member->born_again_time}} </td>
                                        <td>{{($member->is_spirit_filled ? 'Yes' : 'No')}}</td>
                                        <td>{{$member->current_church}}</td>
                                         <td>{{$member->reason}}</td>
                                        <td>{{$member->expectation}}</td>
                                        <td>{{$member->centre}}</td>
                                        <td>{{$member->address}}</td>
                                        <td>{{ number_format($member->payment/100)}}</td>
                                        <td>{{$member->paymenttype}}</td>
                                        <td>{{ number_format($member->total_payments /100) }}</td>
                                        <td>{{$member->region}}</td>
                                        <td>
                                            <div class="dropdown dropdown-topbar d-inline-block">
                                                <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Action <i class="mdi mdi-chevron-down"></i>
                                                    </a>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a href="#changeCentre{{$member->id}}"    data-bs-toggle="modal" data-bs-target="#changeCentre{{$member->id}}" class="dropdown-item">Change Centre</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="changeCentre{{$member->id}}" tabindex="-1" aria-labelledby="changeCentre" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="changeCentre">Assign to Family</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/change/centre/{{$member->id}}" method="POST">
                                                    @csrf
                                                    <div>
                                                        <h3>Current centre: {!! $member->centre !!}</h3>
                                                        <p> </p>
                                                    </div>
                                                    <select class="form-control mb-4" name="centre" id="centre" required>
                                                        <option disabled selected value="">Select your Preferred Centre</option>
                                                        <option value="Ile-Ife">Ile Ife</option>
                                                        <option value="Lekki">Lekki Lagos</option>
                                                        <option value="Ikeja">Ikeja Lagos</option>
                                                        <option value="Agricola">Agricola Ibadan</option>
                                                        <option value="Akure">Akure</option>
                                                        {{-- <option value="Ondo">Ondo</option> --}}
                                                        <option value="Osogbo">Osogbo</option>
                                                        <option value="Online">Online</option>
                                                        <option value="Others">Others - I can't find my preferred Centre</option>
                                                    </select>
                                                    <div class="modal-footer">
                                                        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    @endforeach


                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
            <!-- end row -->
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
        @include('admin.panel.footer')


</div>





<!-- account setting page end -->

@endsection
{{-- @push('scripts')

<!-- JAVASCRIPT -->
<script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('assets/libs/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

 <!-- Required datatable js -->
 <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
 <script src="{{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
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



 <script src="assets/js/pages/datatables.init.js"></script>

<!-- App js -->
<script src="{{asset('assets/js/app.js')}}"></script>


@endpush --}}

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
