@extends('members.layouts.app')
@section('content')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
     <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="page-title-box">
                            <h4>Dashboard</h4>
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Lexa</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-3 col-sm-6">
                        <div class="card mini-stat bg-primary">
                            <div class="card-body mini-stat-img">
                                <div class="mini-stat-icon">
                                    <i class="mdi mdi-cube-outline float-end"></i>
                                </div>
                                <div class="text-white">
                                    <h6 class="text-uppercase mb-3 font-size-16 text-white">Orders</h6>
                                    <h2 class="mb-4 text-white">1,587</h2>
                                    <span class="badge bg-info"> +11% </span> <span class="ms-2">From previous period</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="card mini-stat bg-primary">
                            <div class="card-body mini-stat-img">
                                <div class="mini-stat-icon">
                                    <i class="mdi mdi-buffer float-end"></i>
                                </div>
                                <div class="text-white">
                                    <h6 class="text-uppercase mb-3 font-size-16 text-white">Revenue</h6>
                                    <h2 class="mb-4 text-white">$46,782</h2>
                                    <span class="badge bg-danger"> -29% </span> <span class="ms-2">From previous period</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="card mini-stat bg-primary">
                            <div class="card-body mini-stat-img">
                                <div class="mini-stat-icon">
                                    <i class="mdi mdi-tag-text-outline float-end"></i>
                                </div>
                                <div class="text-white">
                                    <h6 class="text-uppercase mb-3 font-size-16 text-white">Average Price</h6>
                                    <h2 class="mb-4 text-white">$15.9</h2>
                                    <span class="badge bg-warning"> 0% </span> <span class="ms-2">From previous period</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="card mini-stat bg-primary">
                            <div class="card-body mini-stat-img">
                                <div class="mini-stat-icon">
                                    <i class="mdi mdi-briefcase-check float-end"></i>
                                </div>
                                <div class="text-white">
                                    <h6 class="text-uppercase mb-3 font-size-16 text-white">Product Sold</h6>
                                    <h2 class="mb-4 text-white">1890</h2>
                                    <span class="badge bg-info"> +89% </span> <span class="ms-2">From previous period</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->


                <!-- end row -->


                <!-- end row -->


                <!-- end row -->


            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


    </div>
    <!-- end main content-->
    <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            {{-- <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="page-title-box">
                                    <p class="info"><strong>Welcome</strong> Sisanmi Smith</p>
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">SOM</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Time Table</li>
                                        </ol>
                                </div>
                            </div>


                        </div>
                        <!-- end page title -->

                        <div class="row mb-4">
                            <div class="col-xl-3">
                                <div class="card">
                                    <div class="card-body mt-n3 d-grid">
                                        <button class="btn btn-primary btn-block" id="btn-new-event"><i class="mdi mdi-plus-circle-outline"></i> Create New Event</button>


                                        <div id="external-events">
                                            {{-- <br>
                                            <p class="text-muted">Drag and drop your event or click in the calendar</p>
                                            <div class="external-event fc-event bg-success" data-class="bg-success">
                                                <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>New Event Planning
                                            </div>
                                            <div class="external-event fc-event bg-info" data-class="bg-info">
                                                <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Meeting
                                            </div>
                                            <div class="external-event fc-event bg-warning" data-class="bg-warning">
                                                <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Generating Reports
                                            </div>
                                            <div class="external-event fc-event bg-danger" data-class="bg-danger">
                                                <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Create New theme
                                            </div>
                                        </div>

                                        <div class="mt-5">
                                            <h5 class="font-size-14 mb-4">Recent activity :</h5>

                                            <ul class="list-unstyled activity-feed ml-1">
                                                <li class="feed-item">
                                                    <div class="feed-item-list">
                                                        <div>
                                                            <div class="date">15 Jul</div>
                                                            <p class="activity-text mb-0">Responded to need “Volunteer Activities”</p>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="feed-item">
                                                    <div class="feed-item-list">
                                                        <div>
                                                            <div class="date">14 Jul</div>
                                                            <p class="activity-text mb-0">neque porro quisquam est <a href="" class="text-success">@Christi</a> dolorem ipsum quia dolor sit amet</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="feed-item">
                                                    <div class="feed-item-list">
                                                        <div>
                                                            <div class="date">14 Jul</div>
                                                            <p class="activity-text mb-0">Sed ut perspiciatis unde omnis iste natus error sit “Volunteer Activities”</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="feed-item">
                                                    <div class="feed-item-list">
                                                        <div>
                                                            <div class="date">13 Jul</div>
                                                            <p class="activity-text mb-0">Responded to need “Volunteer Activities”</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-xl-9">
                                <div class="card mt-4 mt-xl-0 mb-0">
                                    <div class="card-body">
                                        <div id="calendar"></div>

                                    </div>
                                </div>
                            </div> <!-- end col -->

                        </div>
                        <!-- end row -->


                         <!-- Add New Event MODAL -->
                         <!-- Add New Event MODAL -->
                         <div class="modal fade" id="event-modal" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header py-3 px-4 border-bottom-0">
                                        <h5 class="modal-title" id="modal-title">Event</h5>

                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-hidden="true"></button>

                                    </div>
                                    <div class="modal-body p-4">
                                        <form class="needs-validation" name="event-form" id="form-event" novalidate>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Event Name</label>
                                                        <input class="form-control" placeholder="Insert Event Name"
                                                            type="text" name="title" id="event-title" required value="" />
                                                        <div class="invalid-feedback">Please provide a valid event name</div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Category</label>
                                                        <select class="form-control custom-select" name="category"
                                                            id="event-category">
                                                            <option selected> --Selected-- </option>
                                                            <option value="bg-danger">Danger</option>
                                                            <option value="bg-success">Success</option>
                                                            <option value="bg-primary">Primary</option>
                                                            <option value="bg-info">Info</option>
                                                            <option value="bg-dark">Dark</option>
                                                            <option value="bg-warning">Warning</option>
                                                        </select>




                                                        <div class="invalid-feedback">Please select a valid event category</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-6">
                                                    <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>
                                                </div>
                                                <div class="col-6 text-end">
                                                    <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div> <!-- end modal-content-->
                            </div> <!-- end modal dialog-->
                        </div>
                        <!-- end modal-->

                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->


                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                © <script>document.write(new Date().getFullYear())</script> Lexa <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand.</span>
                            </div>
                        </div>
                    </div>
                </footer>
            </div> --}}
            <!-- end main content-->



@endsection
@push('scripts')

<!-- JAVASCRIPT -->
<script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('assets/libs/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

<!--Morris Chart-->
<script src="{{asset('assets/libs/morris.js/morris.min.js')}}"></script>
<script src="{{asset('assets/libs/raphael/raphael.min.js')}}"></script>

<script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>

<script src="{{asset('assets/js/app.js')}}"></script>
@endpush