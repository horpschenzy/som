@extends('members.layouts.app')
@section('content')
 <!-- account setting page start -->

 @section('content')
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

            <div class="row">
                @include('flash')
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Assignment ID</th>
                                        <th>Topic</th>
                                        <th>Link</th>
                                        <th>Score</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($assignments as $assignment)
                                    <tr>
                                        <td>{{ $assignment->id }}</td>
                                        <td>{{ $assignment->topic }}</td>
                                        <td>
                                            @if ($assignment->submissions && isset($assignment->submissions[0]))
                                            DONE
                                            @else
                                            <a href="{{ $assignment->url }}" target="_blank">{{ $assignment->url }}</a></td>
                                            @endif
                                            <td>{{ ($assignment->submissions) ? $assignment->submissions[0]->score ?? 0 : 0   }}</td>
                                        <td>
                                            <div class="dropdown dropdown-topbar d-inline-block">
                                                <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Action <i class="mdi mdi-chevron-down"></i>
                                                    </a>
                                                @if ($assignment->submissions && isset($assignment->submissions[0]))
                                                @else
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a href="#submitAssignment{{$assignment->id}}"    data-bs-toggle="modal" data-bs-target="#submitAssignment{{$assignment->id}}" class="dropdown-item">Submit Assignment</a>
                                                </div>
                                                @endif

                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="submitAssignment{{$assignment->id}}" tabindex="-1" aria-labelledby="submitAssignment" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="assignToFamily">Submit {{ $assignment->topic }} </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/submit/assignment/{{ $assignment->id }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="card-body">
                                                            <input type="text" value="{{ $assignment->id }}" name="id" hidden>
                                                            <div class="mb-3 row">
                                                                <label for="text-input" class="col-md-4 col-form-label">Assignment</label>
                                                                <div class="col-md-8">
                                                                    <input class="form-control" type="file" name="document" id="text-input">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label for="text-input" class="col-md-4 col-form-label">Assignment</label>
                                                                <div class="col-md-8">
                                                                    <textarea class="form-control" name="text"></textarea>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                                                            <button type="submit" class="btn btn-primary">Submit</button>
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
@endsection


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

<!--tinymce js-->
<script src="{{asset('assets/libs/tinymce/tinymce.min.js')}}"></script>

<!-- email editor init -->
<script src="{{asset('assets/js/pages/email-editor.init.js')}}"></script>


@endpush
