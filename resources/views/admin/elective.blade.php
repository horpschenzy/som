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
