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
                @include('flash')
                <div class="col-12">
                    <div class="card">
                    <form method="POST" action="/livestream" enctype="multipart/form-data">
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
                                    @foreach ($livestreams as $livestream)
                                    <tr>
                                        <td>{{ $livestream->event_name }}</td>
                                        <td>{{ $livestream->url }}</td>
                                        <td>{{ $livestream->type }}</td>
                                        <td><p style="text-align: justify; text-justify: inter-word;">{{ $livestream->description }}</p></td>
                                        <td>{{ ucfirst($livestream->status) }}</td>
                                        <td>
                                            <div class="dropdown dropdown-topbar d-inline-block">
                                                <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Action <i class="mdi mdi-chevron-down"></i>
                                                    </a>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    @if ($livestream->status == 'not started')
                                                        <a class="dropdown-item" onclick="startStream({{ $livestream->id }})">Start</a>
                                                        <div class="dropdown-divider"></div>
                                                        @elseif ($livestream->status == 'started')
                                                        <a class="dropdown-item" onclick="endStream({{ $livestream->id }})">End</a>
                                                        <div class="dropdown-divider"></div>
                                                    @endif
                                                    <a class="dropdown-item" onclick="deleteStream({{ $livestream->id }})">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
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

@push('scripts')

<!-- JAVASCRIPT -->
<script src="{{ asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('assets/libs/jquery-sparkline/jquery.sparkline.min.js')}}"></script>



<!-- plugin js -->
<script src="{{ asset('assets/libs/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('assets/libs/jquery-ui-dist/jquery-ui.min.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function startStream(id){
        swal({
            title: "Are you sure you want to start this stream?",
            icon: "warning",
            buttons: true,
            dangerMode: false,
          })
          .then((start_stream) => {
            if (start_stream) {
                let _token   = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "/start",
                    type:"POST",
                    data:{
                      id:id,
                      _token: _token
                    },

                    success:function(response){
                      console.log(response);
                      if(response) {
                        swal("Poof! Stream Started Successfully!", {
                            icon: "success", });

                        location.reload();
                      }
                    },
                });

            } else {
              swal("Stream Discarded!");
            }
          });
    }
    function endStream(id){
        swal({
            title: "Are you sure you want to end this stream?",
            icon: "warning",
            buttons: true,
            dangerMode: false,
          })
          .then((end_stream) => {
            if (end_stream) {
                let _token   = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "/end",
                    type:"POST",
                    data:{
                      id:id,
                      _token: _token
                    },

                    success:function(response){
                      console.log(response);
                      if(response) {
                        swal("Poof! Stream Ended Successfully!", {
                            icon: "success", });

                        location.reload();
                      }
                    },
                });

            } else {
              swal("Stream Discarded!");
            }
          });
    }
    function deleteStream(id)
    {
        swal({
            title: "Are you sure you want to delete this stream?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((delete_stream) => {
            if (delete_stream) {
                let _token   = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "/delete/stream",
                    type:"POST",
                    data:{
                      id:id,
                      _token: _token
                    },

                    success:function(response){
                      console.log(response);
                      if(response) {
                        swal("Poof! Stream Deleted Successfully!", {
                            icon: "success", });

                        location.reload();
                      }
                    },
                });

            } else {
              swal("Stream Discarded!");
            }
          });
    }
</script>
<!-- App js -->
<script src="{{asset('assets/js/app.js')}}"></script>


@endpush
