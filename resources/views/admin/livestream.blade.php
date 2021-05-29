@extends('admin.layouts.app')
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
                                <li class="breadcrumb-item active">Livestream</li>
                            </ol>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label for="text-input" class="col-md-2 col-form-label">Event Name</label>
                                <div class="col-md-10">
                                    <input class="form-control" required type="text" value="{{old('event_name')}}" name="event_name" id="text-input">
                                </div>
                            </div>
                             <div class="mb-3 row">
                                    <label for="file-input" class="col-md-2 col-form-label">Cover Image</label>
                                    <div class="col-md-10">
                                        <input class="form-control" required type="file" value="{{old('cover_image')}}" name="cover_image" id="file-input">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-url-input" class="col-md-2 col-form-label">URL</label>
                                    <div class="col-md-10">
                                        <input class="form-control" required type="url" value="{{old('url')}}" name="url" id="example-url-input">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-url-input" class="col-md-2 col-form-label">Type</label>
                                    <div class="col-md-10">
                                        <select class="form-select" aria-label="Default select example" required name="type">
                                            <option selected>Open this select video type</option>
                                            <option value="Youtube">Youtube</option>
                                            <option value="Vimeo">Vimeo</option>
                                            <option value="Mixlr">Mixlr</option>
                                          </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-url-input" class="col-md-2 col-form-label">Description</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" required name="description"></textarea>
                                    </div>
                                </div>
                        </div>
                        <div class="text-center mb-3">
                            <button type="submit" class="btn btn-primary waves-effect waves-light w-50">Add Stream
                            </button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-xl-3"></div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body text-center">

                            <h4 class="card-title">Popup with video or map</h4>
                            <p class="card-title-desc">In this example lazy-loading of images is enabled for the next image based on move direction. </p>

                            <div class="row">
                                <div class="col-12">
                                    <a class="popup-youtube btn btn-secondary" href="http://www.youtube.com/watch?v=0O2aH4XLbto">Open YouTube Video</a>
                                    <a class="popup-vimeo btn btn-secondary" href="https://vimeo.com/45830194">Open Vimeo Video</a>
                                    <a class="popup-gmaps btn btn-secondary" href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&amp;hl=en&amp;t=v&amp;hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom">Open Mixlr</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3"></div>
            </div> --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Event Name</th>
                                        <th>URL</th>
                                        <th>Type</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr>
                                        <td>event_name</td>
                                        <td>url</td>
                                        <td>type</td>
                                        <td><p style="text-align: justify; text-justify: inter-word;">description</p></td>
                                        <td>status</td>
                                        <td>
                                            <div class="dropdown dropdown-topbar d-inline-block">
                                                <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Action <i class="mdi mdi-chevron-down"></i>
                                                    </a>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                                        <a class="dropdown-item" onclick="startStream(id)">Start</a>
                                                        <div class="dropdown-divider"></div>

                                                        <a class="dropdown-item" onclick="endStream(id)">End</a>
                                                        <div class="dropdown-divider"></div>

                                                    <a class="dropdown-item" onclick="deleteStream(id)">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
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
