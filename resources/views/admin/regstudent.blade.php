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
                                <li class="breadcrumb-item active">Registered Students</li>
                            </ol>
                    </div>
                </div>

            </div>
            <!-- end page title -->


            surname
            firstname
            othername
            profile_picture
            phonenumber
            password
            email
            marital_status
            gender
            is_born_again
            born_again_time
            is_spirit_filled
            current_church
            reason
            expectation
            centre
            other_location
            address
            payment
            paymenttype
            created_at
            updated_at
            region
            <!-- end page title -->
            <div class="row">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Last Name</th>
                                            <th>First Name</th>
                                            <th>Other Name</th>
                                            <th>Phone Numnber</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Gender</th>
                                            <th>Born Again</th>
                                            <th>Spirit Filled</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($members as $member)
                                        <tr>
                                            <td>{{$member->profile_picture}}</td>
                                            <td>{{$member->surname}}</td>
                                            <td>{{$member->firstname}}</td>
                                            <td>{{$member->othername}}</td>
                                            <td>{{$member->phonenumber}}</td>
                                            <td>{{$member->email}}</td>
                                            <td>{{$member->marital_status}}</td>
                                            <td>{{$member->gender}}</td>
                                            <td> {{$member->is_born_again}}</td>
                                            <th>{{$member->is_spirit_filled}}</th>
                                        </tr>

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
