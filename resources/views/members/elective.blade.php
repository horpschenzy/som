@extends('members.layouts.app')
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
            <form action="{{ route('elective.store') }}" method="POST">
                 @csrf
                {{-- <div class="row-col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Restricted Elective</h5>
                            <select class="form-control" name="restricted" id="" required>
                                <option value="">Choose Restricted Elective</option>
                                @foreach ($restricted as $item)
                                    @if ($studentrestricted)
                                    <option {{ ($item->id == $studentrestricted->elective_id) ? 'selected' : '' }} value="{{$item->id}}">{{$item->name}}</option>
                                    @endif
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-12">
                        @include('flash')
                        <div class="card">
                            <div class="card-body">
                                <h5>Restricted Elective</h5>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($restricted as $item)
                                            <tr>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->Description}}</td>
                                                <td> <div class="form-check form-switch form-switch-lg" dir="ltr">
                                                    @if ($studentrestricted)
                                                    <input type="radio" {{ ($item->id == $studentrestricted->elective_id) ? 'checked' : '' }} name="restricted" value="{{ $item->id }}" class="form-check-input" id="customSwitchsizelg">
                                                    @else
                                                    <input type="radio" name="restricted" checked value="{{ $item->id }}" class="form-check-input" id="customSwitchsizelg">
                                                    @endif
                                                </div></td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        @include('flash')
                        <div class="card">
                            <div class="card-body">
                                <h5>Special Elective</h5>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($specials as $special)

                                            <tr>
                                                <td>{{$special->name}}</td>
                                                <td>{{$special->Description}}</td>
                                                <td> <div class="form-check form-switch form-switch-lg" dir="ltr">
                                                    <input type="radio" {{ in_array($special->id, $specialids) ? 'checked' : '' }} name="special-{{ $special->id }}" value="{{ $special->id }}" class="form-check-input special-elective" id="customSwitchsizelg">
                                                </div></td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                                <button type="submit" id="special-elective-btn" class="btn btn-primary w-100" disabled>Submit</button>
                            </div>

                        </div>
                    </div>
                </div>

            </form>

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
<script type="text/javascript">
var selectedElectives = [];
    (function ($) {
    "use strict";

    
    $('body .special-elective').on("click", function(){
        let value = $(this).val();
        let selectedElectivesCount = $('body .special-elective:checked').length;

        if(selectedElectivesCount < 2){
            $('#special-elective-btn').prop('disabled',true);
        }
        else if(selectedElectivesCount == 2){
            $('#special-elective-btn').prop('disabled',false);
        }
        else if( selectedElectivesCount > 2){
            $('body .special-elective[value="'+selectedElectives[0]+'"]').prop('checked',false);
            selectedElectives.shift(1)
        }

        if(selectedElectives.indexOf(value) === -1){
            selectedElectives.push(value);            
        }

        
    });
})(jQuery);
</script>



@endpush
