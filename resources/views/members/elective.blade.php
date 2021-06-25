@extends('members.layouts.app')
@section('content')
 <!-- account setting page start -->


<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title-box">
                        <h4>Choose Elective</h4>
                            <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li> --}}
                                <li class="breadcrumb-item active">Electives</li>
                            </ol>
                    </div>
                </div>

            </div>
            <!-- end page title -->

            <!-- end page title -->
            <form action="/storeelective" method="POST">
                 @csrf
                {{-- <div class="row-col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Restricted Elective</h5>
                            <select class="form-control" name="retricted" id="">
                                <option disable>Choose Restricted Elective</option>
                                @foreach ($restricted as $item)
                                <option value="{{$item->name}}">{{$item->name}}</option>
                                @endforeach



                            </select>
                        </div>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-12">
                        @include('flash')
                        <div class="card">
                            <div class="card-body">
                                <h5>Restricted Elective</h5>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($restricted as $item)
                                            <tr>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->Description}}</td>
                                                <td> <div class="form-check form-switch form-switch-lg" dir="ltr">
                                                    <input type="checkbox" name="elective" class="form-check-input" id="customSwitchsizelg">
                                                </div></td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        @include('flash')
                        <div class="card">
                            <div class="card-body">
                                <h5>Special Elective</h5>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($specials as $special)
                                            <tr>
                                                <td>{{$special->name}}</td>
                                                <td>{{$special->Description}}</td>
                                                <td> <div class="form-check form-switch form-switch-lg" dir="ltr">
                                                    <input type="checkbox" name="elective" class="form-check-input" id="customSwitchsizelg">
                                                </div></td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary w-100">Submit</button>
                            </div>

                        </div>
                    </div>
                </div>

            </form>

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
