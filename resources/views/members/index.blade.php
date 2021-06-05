@extends('members.layouts.app')
@push('extra-css')

<style>
/*******************************
* MODAL AS LEFT/RIGHT SIDEBAR
* Add "left" or "right" in modal parent div, after class="modal".
* Get free snippets on bootpen.com
*******************************/
.modal.left .modal-dialog,
	.modal.right .modal-dialog {
		position: fixed;
		margin: auto;
		width: 320px;
		height: 100%;
		-webkit-transform: translate3d(0%, 0, 0);
		    -ms-transform: translate3d(0%, 0, 0);
		     -o-transform: translate3d(0%, 0, 0);
		        transform: translate3d(0%, 0, 0);
	}

	.modal.left .modal-content,
	.modal.right .modal-content {
		height: 100%;
		overflow-y: auto;
	}

	.modal.left .modal-body,
	.modal.right .modal-body {
		padding: 15px 15px 80px;
	}

/*Left*/
	.modal.left.fade .modal-dialog{
		left: -320px;
		-webkit-transition: opacity 0.3s linear, left 0.3s ease-out;
		   -moz-transition: opacity 0.3s linear, left 0.3s ease-out;
		     -o-transition: opacity 0.3s linear, left 0.3s ease-out;
		        transition: opacity 0.3s linear, left 0.3s ease-out;
	}

	.modal.left.fade.in .modal-dialog{
		left: 0;
	}

/*Right*/
	.modal.right.fade .modal-dialog {
		right: -320px;
		-webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
		   -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
		     -o-transition: opacity 0.3s linear, right 0.3s ease-out;
		        transition: opacity 0.3s linear, right 0.3s ease-out;
	}

	.modal.right.fade.in .modal-dialog {
		right: 0;
	}

/* ----- MODAL STYLE ----- */
	.modal-content {
		border-radius: 0;
		border: none;
	}

	.modal-header {
		border-bottom-color: #EEEEEE;
		background-color: #FAFAFA;
	}

/* ----- v CAN BE DELETED v ----- */
body {
	background-color: #78909C;
}

.demo {
	padding-top: 60px;
	padding-bottom: 110px;
}

.btn-demo {
	margin: 15px;
	padding: 10px 15px;
	border-radius: 0;
	font-size: 16px;
	background-color: #FFFFFF;
}

.btn-demo:focus {
	outline: 0;
}

.demo-footer {
	position: fixed;
	bottom: 0;
	width: 100%;
	padding: 15px;
	background-color: #212121;
	text-align: center;
}

.demo-footer > a {
	text-decoration: none;
	font-weight: bold;
	font-size: 16px;
	color: #fff;
}

</style>
@endpush
@section('content')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
     <div class="main-content">
        <div class="page-content">
            @include('members.inc.message')
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="page-title-box">
                            <h4>Dashboard</h4>
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">School of Ministry</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Time Table</li>
                                </ol>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">SOM Time table</h4>
                            <p class="card-title-desc">Start time: 8am</p>

                            <div class="table-responsive">
                                <table class="table table-bordered border-primary mb-0">

                                    <thead>
                                        <tr>
                                            <th>Week</th>
                                            <th>Date</th>
                                            <th colspan="3"><div class="text-center"> Time</div></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>1</th>
                                            <td>FRIDAY
                                                11/06/2021
                                                </td>
                                            <td colspan="3"><div class="text-center"> NIL</div></td>


                                        </tr>
                                        <tr>
                                            <th>1</th>
                                            <td>SATURDAY
                                                12/06/2021
                                                </td>
                                            <td>Ministry Basic Course <strong>(MBC)</strong></td>
                                            <td>Break</td>
                                            <td>Ministry Basic Course <strong>(MBC)</strong></td>

                                        </tr>
                                        <tr>
                                            <th>2</th>
                                            <td>FRIDAY
                                                18/06/2021
                                                </td>
                                            <td>Project Writing and Presentation <strong>(PWP)</strong></td>
                                            <td>Break</td>
                                            <td>World evangelization Course  <strong>(WEC)</strong></td>

                                        </tr>
                                        <tr>
                                            <th>2</th>
                                            <td>SATURDAY
                                                19/06/2021
                                                </td>
                                            <td>Ministry Basic Course <strong>(MBC)</strong></td>
                                            <td>Break</td>
                                            <td>World evangelization Course  <strong>(WEC)</strong></td>

                                        </tr>
                                        <tr>
                                            <th>3</th>
                                            <td>FRIDAY 25/06/2021</td>
                                            <td colspan="3"><div class="text-center">Church Growth Course <strong>(CGC)</strong></div></td>

                                        </tr>
                                        <tr>
                                            <th>3</th>
                                            <td>SATURDAY
                                                26/06/2021
                                                </td>
                                            <td>Church Management Course  <strong>(CMC)</strong></td>
                                            <td>Break</td>
                                            <td>Ministry Basic Course <strong>(MBC)</strong></td>
                                        </tr>
                                        <tr>
                                            <th>4</th>
                                            <td>FRIDAY
                                                02/07/2021
                                                </td>
                                            <td>Social Media for Ministry <strong>(PMC / SMM)</strong></td>
                                            <td>Break</td>
                                            <td>Leadership and Ministry Ethics <strong>(LME)</strong></td>
                                        </tr>
                                        <tr>
                                            <th>4</th>
                                            <td>SATURDAY
                                                03/07/2021
                                                </td>
                                            <td>Social Media for Ministry <strong>(DAC)</strong></td>
                                            <td>Break</td>
                                            <td>Church Management Course  <strong>(CMC)</strong></td>
                                        </tr>
                                        <tr>
                                            <th>5</th>
                                            <td>FRIDAY
                                                09/07/2021
                                                </td>
                                            <td>Leadership and Ministry Ethics <strong>(LME)</strong></td>
                                            <td>Break</td>
                                            <td>Media and Music for Ministry / Emotional
                                                Intelligence
                                                  <strong>(MMM / EIM)</strong></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-3 mt-4">
                        {{-- <div class="text-center">
                            <p class="text-muted">Center modal</p>
                            <!-- Small modal -->
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">Center modal</button>
                        </div> --}}

                        <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title mt-0">Center modal</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                        <p class="mb-0">Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.
                                        </p>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->

                        <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title mt-0">Center modal</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                        <p class="mb-0">Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.
                                        </p>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    </div>
                </div>













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
{{-- <script src="{{asset('assets/libs/morris.js/morris.min.js')}}"></script>
<script src="{{asset('assets/libs/raphael/raphael.min.js')}}"></script> --}}

{{-- <script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script> --}}

<script src="{{asset('assets/js/app.js')}}"></script>
@endpush
