@extends('admin.layouts.app')


@section('styles')
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
 <!-- account setting page start -->
 <div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title-box">
                        <h4>Dashboard</h4>
                            <ol class="breadcrumb m-0">
                                 <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                               {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li> --}}
                                <li class="breadcrumb-item active">Assignment</li>
                            </ol>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            @if (auth()->user()->user_type == 'ADMIN')
            <div class="row">
                <div class="col-12">
                    @include('flash')
                    <div class="card">
                    <form method="POST" action="/assignment" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label for="text-input" class="col-md-2 col-form-label">Assignment</label>
                                <div class="col-md-10">
                                    <input class="form-control" required type="text" value="{{old('topic')}}" name="topic" id="text-input">
                                </div>
                                <label for="text-input" class="col-md-2 col-form-label">URL</label>
                                <div class="col-md-10 mt-2">
                                    <input class="form-control" type="text" value="{{old('url')}}" name="url" id="text-input">
                                </div>

                            </div>
                        </div>
                        <div class="text-center mb-3">
                            <button type="submit" class="btn btn-primary waves-effect waves-light w-50">Add Assignment
                            </button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Assignment ID</th>
                                        <th>Topic</th>
                                        <th>URL</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($assignments as $assignment)
                                    <tr>
                                        <td>{{ $assignment->id }}</td>
                                        <td>{{ $assignment->topic }}</td>
                                        <td><a href="{{ $assignment->url }}" target="_blank">{{ $assignment->url }}</a></td>
                                        <td>{{ ucfirst($assignment->status) }}</td>
                                        <td>
                                            <div class="dropdown dropdown-topbar d-inline-block">
                                                <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Action <i class="mdi mdi-chevron-down"></i>
                                                    </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    @if (auth()->user()->usertype == 'admin')
                                                    <a href="#editAssignment{{$assignment->id}}"    data-bs-toggle="modal" data-bs-target="#editAssignment{{$assignment->id}}" class="dropdown-item">Edit</a>
                                                    <a class="dropdown-item" onclick="deleteAssignment({{ $assignment->id }})">Delete</a>
                                                    @else
                                                    <a href="/view/submissions/{{$assignment->id}}" target="_blank" class="dropdown-item">View Submissions</a>
                                                    @endif
                                                </div>

                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="editAssignment{{$assignment->id}}" tabindex="-1" aria-labelledby="editAssignment" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="assignToFamily">Edit {{ $assignment->topic }} </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/edit/assignment/{{ $assignment->id }}" method="post">
                                                        @csrf
                                                        <div class="card-body">
                                                            <input type="text" value="{{ $assignment->id }}" name="id" hidden>
                                                            <div class="mb-3 row">
                                                                <label for="text-input" class="col-md-4 col-form-label">Assignment</label>
                                                                <div class="col-md-8">
                                                                    <input class="form-control" required type="text" value="{{$assignment->topic}}" name="topic" id="text-input">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label for="text-input" class="col-md-4 col-form-label">Status</label>
                                                                <div class="col-md-8">
                                                                    <select name="status" required="" id="" class="form-select" aria-label="Default select example">
                                                                        <option value="{{ $assignment->status }}">{{ ucfirst($assignment->status) }}</option>
                                                                        <option value="pending">Pending</option>
                                                                        <option value="active">Active</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
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
                <!-- end col -->
            </div>

            <!-- end row -->



        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

        @include('admin.panel.footer')


</div>

{{-- <div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title-box">
                        <h4>Assignment</h4>
                            <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Assignment</li>
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
                                    <label for="attendance-date" class="col-md-2 col-form-label">Attendance Date</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="date" value="" id="attendance-date">
                                    </div>
                                </div>


                        <div class="text-center mb-3">
                            <button type="Search" class="btn btn-primary waves-effect waves-light">Search
                            </button>
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
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Class</th>
                                        <th>Time-in</th>
                                        <th>Time-out</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                    </tr>
                                    <tr>
                                        <td>Garrett Winters</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>63</td>
                                        <td>2011/07/25</td>
                                    </tr>
                                    <tr>
                                        <td>Ashton Cox</td>
                                        <td>Junior Technical Author</td>
                                        <td>San Francisco</td>
                                        <td>66</td>
                                        <td>2009/01/12</td>
                                    </tr>
                                    <tr>
                                        <td>Cedric Kelly</td>
                                        <td>Senior Javascript Developer</td>
                                        <td>Edinburgh</td>
                                        <td>22</td>
                                        <td>2012/03/29</td>
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


</div> --}}





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
