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
                            <div class="mb-3 row">
                                    <label for="class" class="col-md-2 col-form-label">Class</label>
                                    <div class="col-md-10">
                                        <select name="classes" class="form-control">
                                            <option selected disabled> Select the Class</option>
                                            @foreach ($livestream as $item)
                                            <option value="{{$item->event_name}}">{{$item->event_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="attendance-date" class="col-md-2 col-form-label">Attendance Date</label>
                                <div class="col-md-10">
                                     <select name="classes" class="form-control">
                                        <option selected disabled> Select Class Date</option>
                                        @foreach ($livestream as $item)
                                            <option value="{{$item->created_at}}">{{$item->created_at}}</option>
                                            @endforeach

                                    </select>
                                    {{-- <input class="form-control" type="date" value="" id="attendance-date"> --}}
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Reg No.</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($users as $item)
                                    <tr>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->reg_no}}</td>
                                        <td> <div class="form-check form-switch form-switch-lg" dir="ltr">
                                            <input type="checkbox" class="form-check-input" id="customSwitchsizelg">
                                        </div></td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <a href="{{ route('attendanceresult')}}" class="btn btn-primary w-100">Submit</a>
                        </div>

                    </div>
                </div>
            </div>




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
