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
                        <h4>Announcement</h4>
                            <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li> --}}
                                <li class="breadcrumb-item active">Emails</li>
                            </ol>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="/sendmail" class="btn btn-primary w-100 mb-5">Send Email</a>
                </div>
            </div>
            <!-- end page title -->

            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="mb-3 row">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-form__body card-body">
                                            {{-- <div class="form-group">
                                                <label for="fname">Slug (URL)</label>
                                                <div class="help-block my-1 p-1 text-muted bg-light border rounded">/course-title-is-editable-here</div>
                                            </div> --}}

                                            <div class="form-group mb-3">
                                                <label for="course">Date of Announcement</label>
                                                <select name="date" class="form-control" id="">
                                                    <option selected disabled>Date of Announcement</option>
                                                </select>
                                                {{-- <input id="course" type="text" name="courseTitle" class="form-control" placeholder="Honour in Ministry" value="Honour in Ministry" disabled> --}}
                                            </div>


                                            <div class="form-group mb-3">
                                                <label for="lesson">Subject</label>
                                                <input id="subject" type="text" name="subject" class="form-control" placeholder="Subject">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="duration">Center</label>
                                                <select name="center" class="form-control" id="">
                                                    <option selected disabled>Center</option>

                                                </select>
                                                {{-- <input id="center" type="text" name="center" class="form-control" placeholder="1:00" > --}}
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
                                        <th>Date</th>
                                        <th>Subject</th>
                                        <th>Center</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>22nd June, 2021</td>
                                        <td>Change of Lecture Time</td>
                                        <td>Osogbo</td>
                                        <td>Everyone should be informed that class timetable has been updated</td>
                                        <td><div>
                                            <a href="#" class="btn btn-primary">Edit</a>
                                        </div></td>
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


<!--tinymce js-->
<script src="assets/libs/tinymce/tinymce.min.js"></script>

<!-- email editor init -->
<script src="assets/js/pages/email-editor.init.js"></script>



<!-- App js -->
<script src="{{asset('assets/js/app.js')}}"></script>


@endpush
