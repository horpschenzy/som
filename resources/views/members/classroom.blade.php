@extends('members.layouts.app')
@section('content')
 <!-- account setting page start -->

 <div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title-box">
                        <h4>Classroom</h4>
                            <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{route('member.dashboard')}}">Dashboard</a></li>
                                {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li> --}}
                                <li class="breadcrumb-item active">Classroom</li>
                            </ol>
                    </div>
                </div>
            </div>
             <!-- end page title -->
            <div class="row">
                <div class="col-xl-2"></div>
                        <div class="col-xl-8">
                                <div class="card">
                                    <div class="card-body">
                                        @if ($livestream)
                                        <h4 class="card-title">{{ $livestream->event_name }}</h4>
                                        <p class="card-title-desc">{{ $livestream->description }}</p>

                                        <!-- 1:1 aspect ratio -->
                                        <div class="ratio ratio-4x3">
                                            @if ($livestream->type == 'Youtube')
                                                <iframe src="{{ $livestream->url }}" title="{{ $livestream->event_name }}" allowfullscreen></iframe>
                                            @elseif ($livestream->type == 'Vimeo')
                                                <iframe src="{{ $livestream->url }}" title="{{ $livestream->event_name }}" allowfullscreen></iframe>
                                            @elseif ($livestream->type == 'Mixlr')
                                                <iframe src="{{ $livestream->url }}" title="{{ $livestream->event_name }}" width="100%" height="180px" scrolling="no" frameborder="no" marginheight="0" marginwidth="0"></iframe>
                                            @endif
                                        </div>
                                        @else
                                            <h4 class="card-title"> NO STREAM AVAILABLE. PLEASE CHECK BACK LATER</h4>
                                        @endif


                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2"></div>



            </div>


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

@endpush
