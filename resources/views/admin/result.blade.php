@extends('admin.layouts.app')
@push('extra-css')
<link href="{{asset('assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endpush


@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            @include('flash')
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Upload Student Results</h4>

                        <form action="/result" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-lable">CSV File Only</label>
                                <input type="file" class="form-control" data-buttonname="btn-secondary" name="results">
                            </div>
                            <button class="btn btn-primary w-100" type="submit">Upload</button>
                        </form>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card">
                    <div class="card-body">
                         <div class="col-lg-12">
                             @if(count($examrecords))
                                <div class="table-responsive">
                                    <table class="table table-bordered border-primary mb-0">

                                        <thead>
                                            <tr>
                                                <th>Surname</th>
                                                <th>Firstname</th>
                                                <th>Reg Number</th>
                                                <th>Score</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($examrecords as $record)
                                            <tr>
                                                <td>{{ $record->surname}}</td>
                                                <td>{{ $record->firstname}}</td>
                                                <td>
                                                    {{ $record->reg_no}}
                                                </td>
                                                <td>
                                                    {{ $record->score}}
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                              @else

                                <p>No Exam Record found</p>

                              @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

<!-- App js -->
<script src="{{asset('assets/js/app.js')}}"></script>


@endpush
