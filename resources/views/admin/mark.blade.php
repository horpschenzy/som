@extends('admin.layouts.app')
@section('content')
 <!-- account setting page start -->


<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title-box">
                        <h4>Mark Attendance</h4>
                            <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li> --}}
                                <li class="breadcrumb-item active">Mark Attendance</li>
                            </ol>
                    </div>
                </div>

            </div>
            <!-- end page title -->

            <!-- end page title -->
            <div class="row">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Class</th>
                                            <th>Reg No.</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td> <div class="form-check form-switch form-switch-lg" dir="ltr">
                                                <input type="checkbox" class="form-check-input" id="customSwitchsizelg">
                                            </div></td>
                                        </tr>
                                        <tr>
                                            <td>Garrett Winters</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>63</td>
                                            <td> <div class="form-check form-switch form-switch-lg" dir="ltr">
                                                <input type="checkbox" class="form-check-input" id="customSwitchsizelg">
                                            </div></td>
                                        </tr>
                                        <tr>
                                            <td>Ashton Cox</td>
                                            <td>Junior Technical Author</td>
                                            <td>San Francisco</td>
                                            <td>66</td>
                                            <td> <div class="form-check form-switch form-switch-lg" dir="ltr">
                                                <input type="checkbox" class="form-check-input" id="customSwitchsizelg">
                                            </div></td>
                                        </tr>
                                        <tr>
                                            <td>Cedric Kelly</td>
                                            <td>Senior Javascript Developer</td>
                                            <td>Edinburgh</td>
                                            <td>22</td>
                                            <td> <div class="form-check form-switch form-switch-lg" dir="ltr">
                                                <input type="checkbox" class="form-check-input" id="customSwitchsizelg">
                                            </div></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="btn btn-primary w-100">Submit</a>
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
@push('scripts')

<!-- JAVASCRIPT -->
<script src="{{ asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('assets/libs/jquery-sparkline/jquery.sparkline.min.js')}}"></script>





<!-- App js -->
<script src="{{asset('assets/js/app.js')}}"></script>


@endpush
