@extends('members.layouts.app')
@section('content')
 <!-- account setting page start -->

 <div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title-box">
                        <h4>Assignment</h4>
                            <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{route('member.dashboard')}}">Dashboard</a></li>
                                {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li> --}}
                                <li class="breadcrumb-item active">Assignment</li>
                            </ol>
                    </div>
                </div>
            </div>
             <!-- end page title -->

                        <!-- end page title -->
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-form__body card-body">
                                        {{-- <div class="form-group">
                                            <label for="fname">Slug (URL)</label>
                                            <div class="help-block my-1 p-1 text-muted bg-light border rounded">/course-title-is-editable-here</div>
                                        </div> --}}

                                        <div class="form-group mb-3">
                                            <label for="course">Course Name</label>
                                            <select class="form-control" name="courseTitle" id="">
                                                <option disabled selected>Choose Course</option>
                                                <option value="MBC">Ministry Basic Course</option>
                                                <option value="LMC">Project Writing and Presentation</option>
                                                <option value="EMC">Event Management Course</option>
                                            </select>

                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="assignment">Assignment Title</label>
                                            <input id="assignment" type="text" name="assignmentTitle" class="form-control" placeholder="Assignment Title">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="upload">Upload attachment</label>
                                            <div class="custom-file">
                                            <input type="file" class="btn btn-sm btn-light">
                                        </div>
                                        </div>
                                        <div class=""><div>
                                                        <div class="mb-3">
                                                            <form method="post">
                                                                <textarea id="email-editor" name="area"></textarea>
                                                            </form>
                                                        </div>

                                                        <div class="btn-toolbar form-group mb-0">
                                                            <div class="">
                                                                <button type="button" class="btn btn-success waves-effect waves-light me-1"><i class="far fa-save"></i></button>
                                                                <button type="button" class="btn btn-success waves-effect waves-light me-1"><i class="far fa-trash-alt"></i></button>
                                                                <button class="btn btn-primary waves-effect waves-light">
                                                                    <span>Submit</span> <i class="fab fa-telegram-plane ms-2"></i>
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                    </div>
                                </div>
                            </div>

                        </div>



                        <!-- end row -->

        </div>
    </div>
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

<!--tinymce js-->
<script src="{{asset('assets/libs/tinymce/tinymce.min.js')}}"></script>

<!-- email editor init -->
<script src="{{asset('assets/js/pages/email-editor.init.js')}}"></script>


@endpush
