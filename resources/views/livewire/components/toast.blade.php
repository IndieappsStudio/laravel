<div>
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" style="position: absolute; top: 10px; right: 10px; z-index:10000;">
        <div class="toast-header">
            <img src="../../assets/images/logo.png" class="m-r-sm" alt="Toast image" height="18" width="18">
            <strong class="me-auto">{{ $title }}</strong>
            <small class="text-muted">{{ $time }}</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {!! $message !!}
        </div>
    </div>
</div>
