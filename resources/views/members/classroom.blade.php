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
                <div class="col-xl-3"></div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body text-center">
                            @if ($livestream)

                            <h4 class="card-title">Select Platform type</h4>
                            <h3 class="card-title">Event Name : {{$livestream->event_name}}</h3>
                            <div class="row">
                                <div class="col-12">
                                    @if ($livestream->youtube_url)
                                        <a class="btn btn-primary" href="/member/classroom/{{$livestream->id}}/Youtube">Open YouTube Video</a>
                                    @endif
                                    @if ($livestream->vimeo_url)
                                        <a class="btn btn-secondary" href="/member/classroom/{{$livestream->id}}/Vimeo">Open Vimeo Video</a>
                                    @endif
                                    @if ($livestream->mixlr_url)
                                        <a class="btn btn-info" href="/member/classroom/{{$livestream->id}}/Mixlr">Open Mixlr Audio</a>
                                    @endif
                                </div>
                            </div>
                            @else
                                <h4 class="card-title"> NO STREAM AVAILABLE. PLEASE CHECK BACK LATER</h4>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xl-3"></div>
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
