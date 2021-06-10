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
                        <h4>Attendance</h4>
                            <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li> --}}
                                <li class="breadcrumb-item active">Attendance</li>
                            </ol>
                    </div>
                </div>

            </div>
            <!-- end page title -->

            <!-- end page title -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Class</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>2011/04/25</td>
                                        <td>SOM 101</td>
                                        <td>
                                            <a href="#" class="btn btn-primary">View</a>

                                        </td>

                                    </tr>
                                    <tr>
                                        <td>2011/04/25</td>
                                        <td>SOM 102</td>
                                        <td>
                                            <a href="#" class="btn btn-primary">View</a>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2011/04/25</td>
                                        <td>SOM 103</td>
                                        <td>
                                            <a href="#" class="btn btn-primary">View</a>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2011/04/25</td>
                                        <td>SOM 104</td>
                                        <td>
                                            <a href="#" class="btn btn-primary">View</a>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            <!-- end row -->


        </div>
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
