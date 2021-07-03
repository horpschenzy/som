@extends('admin.layouts.app')
@push('extra-css')
<!-- DataTables -->
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />

<link href="{{ asset('assets/libs/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('content')
<!-- account setting page start -->


<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title-box">
                        <h4>Give Access</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li> --}}
                            <li class="breadcrumb-item active">Give Access</li>
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
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <select class="selectpicker form-control show-tick mb-4"
                                                id="select-student" data-live-search="true">
                                                <option disabled selected>Select Student</option>
                                                @foreach ($users as $user)
                                                <option data-tokens="{{ $user->name }}" value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <button id="give-access" class="form-control btn-primary d-none" type="submit"><span>Give Access</span></button>
                                        </div>

                                    </div>

                                    <div class="col-sm-9" id="user-detail">

                                    </div>
                                </div>




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

    <!-- Required datatable js -->
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
    <!-- App js -->
    <script src="{{asset('assets/js/app.js')}}"></script>

    <script src="{{ asset('assets/libs/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script>
        var currentUser = 0;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function () {
            $('select').selectpicker();
            
            $('#select-student').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
                $('#give-access').removeClass('d-none');
                currentUser = $(this).val();

                let userDetailsURL = "{{ secure_url(route('admin.get-user-details',[],false)) }}/" + currentUser;
                
                $.get(userDetailsURL, function(response){
                    $('#user-detail').html(response);
                });
                console.log(e, clickedIndex, isSelected, previousValue, );
            });

            $('#give-access').on('click',function(){
                if($('#select-student').val() == null){
                    alert("Please select a student");
                    return false;
                }

                let url = "{{ secure_url(route('admin.process-access',[],false)) }}/" + currentUser;
                $.post(url, function(response){
                    $('#select-student option[value="'+currentUser+'"]').remove();
                    $('#user-detail').html(response);
                });
            })

        });
    </script>


    @endpush