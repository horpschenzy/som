@if (Session::get('alert-type') == 'success')
<div class="alert alert-success alert-dismissible fade show col-6" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
    <strong>{{ Session::get('message') }}</strong>
</div>
@endif


@if (Session::get('alert-type') == 'error')
<div class="alert alert-danger alert-dismissible fade show col-6" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
    <strong>{{ Session::get('message') }}</strong>
</div>
@endif


@if (Session::get('alert-type') == 'warning')
<div class="alert alert-warning alert-dismissible fade show col-6" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
    <strong>{{ Session::get('message') }}</strong>
</div>
@endif


@if (Session::get('alert-type') == 'info')
<div class="alert alert-info alert-dismissible fade show col-6" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
    <strong>{{ Session::get('message') }}</strong>
</div>
@endif
