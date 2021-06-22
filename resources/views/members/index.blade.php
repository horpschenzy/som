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
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                    <strong>OVERVIEW</strong>
                    <P>Segun Obadje Teaching Ministries (SOTM) School of Ministry is a new creation, bible-based school with the vision of equipping believers for ministry and helping men
                        so that men and women come into the light of purpose and God’s preordination.
                        The School is a 6-week spiritual boot camp, with various activities ranging from classes,
                         project works, tests, assignments, book review etc, all contributing to the equipping of the attendees.
                        <strong>This year, the school will have both online and onsite students</strong>.
                    </P>
                </div>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                    <strong>E-CENTRES</strong>
                    <P>The onsite students shall gather at various approved learning centres which
                         we refer to as E-centres. An E-centre is saddled with the primary responsibility
                          of creating a conducive environment for the students to encounter God across the various
                         line up of school activities while also maintaining the standard of excellence in delivery that the school stands for.
                        <strong>In other to achieve these, every e-centre must carefully read and execute this document for SOM 2021.</strong>.
                    </P>
                    <p>
                        The School of Ministry 2021 will run between the 19th of June, 2021 to the 7th of August, 2021. The school will run for
                        the duration of 6 weeks; 4 weeks of lectures (Fridays, and Saturdays). Examinations will be conducted on Sunday,
                        25th of July, 2021. The Project Defence is to be conducted on Friday, the 30th of July and Saturday, the 31st of July,
                        2021 while the graduation ceremony will hold on Saturday, 7th of August, 2021. (Check the time table for full details)
                    </p>
                </div>
                <!-- end page title -->
                <div class="row mb-4">
                    <div class="col-xl-3">
                        <div class="card">
                            <div class="card-body mt-n3 d-grid">
                                {{-- <button class="btn btn-primary btn-block" id="btn-new-event"><i class="mdi mdi-plus-circle-outline"></i> Create New Event</button> --}}


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
                                    </div> --}}
                                </div>

                                <div class="mt-5">
                                    <h5 class="font-size-14 mb-4"><strong>ORDER OF CLASS PROCEDINGS</strong></h5>
                                    <hr>
                                    <div class="">
                                        <h5 class="font-size-14 mb-4"><span style="color: red">  FRIDAY CLASSES</span></h5>
                                        <table>
                                            <thead>
                                                <th>Description</th>
                                                <th style="font-size: 10px">Time (WAT-PM)</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Students Signing in</td>
                                                    <td>5:30-5:45</td>
                                                </tr>
                                                <tr>
                                                    <td> Prayers</td>
                                                    <td>5:45-6:00</td>
                                                </tr>
                                                <tr>
                                                    <td>LECTURE I</td>
                                                    <td>6:00-7:00</td>
                                                </tr>
                                                <tr>
                                                    <td>BREAK</td>
                                                    <td>7:00-7:10</td>
                                                </tr>
                                                <tr>
                                                    <td>LECTURE II</td>
                                                    <td>7:10-8:10</td>
                                                </tr>
                                                <tr>
                                                    <td>TEST</td>
                                                    <td>8:10-8:20</td>
                                                </tr>
                                                <tr>
                                                    <td>Announcement</td>
                                                    <td>8:20-8:25</td>
                                                </tr>
                                                <tr>
                                                    <td>Students Signing out</td>
                                                    <td>8:25-8:30</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                    <hr>
                                    <div class="">
                                        <h5 class="font-size-14 mb-4"><span style="color: red"> SATURDAY CLASSES</span></h5>
                                        <table>
                                            <thead>
                                                <th>Description</th>
                                                <th style="font-size: 10px">Time (WAT-AM)</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Students Signing in</td>
                                                    <td>7:30-7:45</td>
                                                </tr>
                                                <tr>
                                                    <td> Prayers</td>
                                                    <td>7:45-8:00</td>
                                                </tr>
                                                <tr>
                                                    <td>LECTURE I</td>
                                                    <td>8:00-10:00</td>
                                                </tr>
                                                <tr>
                                                    <td>BREAK</td>
                                                    <td>10:00-10:15</td>
                                                </tr>
                                                <tr>
                                                    <td>LECTURE II</td>
                                                    <td>10:15-11:15</td>
                                                </tr>
                                                <tr>
                                                    <td>TEST</td>
                                                    <td>11:15-11:30</td>
                                                </tr>
                                                <tr>
                                                    <td>Announcement</td>
                                                    <td>11:30-11:35</td>
                                                </tr>
                                                <tr>
                                                    <td>Students Signing out</td>
                                                    <td>11:35-11:45</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>




                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col-->

                    <div class="col-xl-9">
                        <div class="card mt-4 mt-xl-0 mb-0">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">SOM Time table</h4>


                                    <div class="table-responsive">
                                        <table class="table table-bordered border-primary mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Week</th>
                                                    <th>Date</th>
                                                    <th><div class="text-center"> Course</div></th>
                                                    <th>Duration</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th rowspan="3">1</th>
                                                    <td>Saturday, June 19</td>
                                                    <td>Ministry Basic Course <strong>(MBC)</strong></td>
                                                    <td><strong>3 Hours</strong></td>
                                                </tr>
                                                <tr>
                                                    <td rowspan="2">Friday, June 25</td>
                                                    <td>Project Writing and Presentation  <strong>(PWP)</strong></td>
                                                    <td><strong>1 Hours</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Church Growth Course <strong>(CGC)</strong></td>
                                                    <td><strong>1 Hours</strong></td>
                                                </tr>
                                                <tr>
                                                    <th rowspan="3">2</th>
                                                    <td rowspan="2">Saturday, June 26</td>
                                                    <td>Ministry Basic Course <strong>(MBC)</strong></td>
                                                    <td><strong>3 Hours</strong></td>
                                                </tr>
                                                <tr>

                                                    <td><div>Church Growth Course <strong>(CGC)</strong></div></td>
                                                    <td><strong>1 Hours</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Friday, July 2</td>
                                                    <td>World Evangelization Course<strong>(WEC)</strong></td>
                                                    <td><strong>3 Hours</strong></td>
                                                </tr>
                                                <tr>
                                                    <th rowspan="4">3</th>
                                                    <td rowspan="2">Saturday, July 3</td>
                                                    <td>Church Management Course <strong>(CMC)</strong></td>
                                                    <td><strong>3 Hours</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Ministry Basic Course <strong>(MBC)</strong></td>
                                                    <td><strong>3 Hours</strong></td>
                                                </tr>
                                                <tr>
                                                    <td rowspan="2">Friday, July 9</td>
                                                    <td> Program Management & Planning Course <strong>(PMC)</strong> /
                                                        Social Media in Ministry<strong>(SMM)</strong>
                                                        </td>
                                                        <td><strong>1 Hours</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Leadership & Ministry Ethics Course (LME)</td>
                                                    <td><strong>1 Hours</strong></td>
                                                </tr>
                                                <tr>
                                                    <td rowspan="5">4</td>
                                                    <td rowspan="2">Saturday, July 10</td>
                                                    <td>Dynamics of the Anointing Course (DAC)</td>
                                                    <td><strong>2 Hours</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Church Management Course (CMC)</td>
                                                    <td><strong>1 Hours</strong></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"> <div class="text-center"><strong>DOSSOM 2021</strong></div></td>
                                                </tr>
                                                <tr>
                                                    <td rowspan="2">Friday, July 23</td>
                                                    <td>Leadership & Ministry Ethics Course (LME)</td>
                                                    <td>1 hour</td>
                                                </tr>
                                                <tr>
                                                    <td>Media & Music in Ministry (MMM) / <br>
                                                        Emotional Intelligence in Ministry (EIM)
                                                        </td>
                                                    <td><strong>1 Hours</strong></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->

                </div>
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
{{-- <script src="{{asset('assets/libs/morris.js/morris.min.js')}}"></script>
<script src="{{asset('assets/libs/raphael/raphael.min.js')}}"></script> --}}

{{-- <script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script> --}}

<script src="{{asset('assets/js/app.js')}}"></script>
@endpush
