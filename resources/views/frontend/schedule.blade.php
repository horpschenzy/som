@extends('frontend.layouts.frontend')
@section('content')

<div class="breadcrumb-area">
    <div class="breadcrumb-top default-overlay bg-img pt-100 pb-95" style="background-image:url(assets/img/about-us.jpg);">
        <div class="container">
            <h2>School Schedule</h2>
            <p>Segun Obadje Teaching Ministries (SOTM) started in response to God’s mandate to His servants, Pastor Segun and Funke Obadje and the ministry has enjoyed increase in every facet with open doors within and outside Nigeria.</p>
        </div>
    </div>
</div>
<div class=" pt-50 pb-115">
    <div class="container">
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

                        <div class="">
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
                        <div class="">
                            <div class="table-responsive">
                                <table class="table table-bordered  mb-0">
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

    </div>
</div>
@endsection

@push('scripts')




<!-- JS
============================================ -->

<!-- jQuery JS -->
<script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
<!-- Popper JS -->
<script src="assets/js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Plugins JS -->
<script src="assets/js/plugins.js"></script>
<!-- Ajax Mail -->
<script src="assets/js/ajax-mail.js"></script>
<!-- Main JS -->
<script src="assets/js/main.js"></script>


@endpush









