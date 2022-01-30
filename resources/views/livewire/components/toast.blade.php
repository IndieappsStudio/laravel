<div>
    <div class="toast fade" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000" style="position: absolute; top: 10px; right: 10px; z-index:10000; width: 300px">
        <div class="toast-header">
            <strong class="mr-auto">{{ $title }}</strong>
            <small>{{ $time }}</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <i class="material-icons">close</i>
            </button>
        </div>
        <div class="toast-body">
            {!! $message !!}
        </div>
    </div>
</div>
