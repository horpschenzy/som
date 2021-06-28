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
            <div class="row">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @include('flash')
                            <div class="card-body">
                                <form method="POST" action="/elective">
                                    @csrf
                                    <div class="card-body">
                                        <div class="mb-3 row">
                                            <label for="text-input" class="col-md-2 col-form-label">Elective Name</label>
                                            <div class="col-md-10">
                                                <input class="form-control" required type="text" value="{{old('name')}}" name="name" id="text-input">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="text-input" class="col-md-2 col-form-label">Elective Type</label>
                                            <div class="col-md-10">
                                                <select name="type" id="" class="form-control" required>
                                                    <option selected disabled>Choose Elective Type</option>
                                                    <option value="RESTRICTED">RESTRICTED ELECTIVE COURSE</option>
                                                    <option value="SPECIAL">SPECIAL ELECTIVE COURSES</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-url-input" class="col-md-2 col-form-label">Description</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" required value="{{old('description')}}" name="description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center mb-3">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light w-50">Add Elective
                                        </button>
                                    </div>
                                </form>


                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @include('flash')
                        <div class="card-body">
                            @if (count($electives))
                            <div class="table-responsive">
                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Elective Type</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($electives as $elective)
                                        <tr>
                                            <td>{{$elective->name}}</td>
                                            <td>{{$elective->Description}}</td>
                                            <td>{{$elective->type}}</td>
                                        </tr>
                                        @endforeach


                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            @else ( No Data Electives)
                            @endif
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
<script src="{{asset('assets/js/app.js')}}"></script>


@endpush
