<div>
    @if ($isOpen)
        <div class="modal fade" id="baseModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="baseModalLabel" aria-hidden="true">
            <div class="modal-dialog {{$modalSize}}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="baseModalLabel">{{ $title }}</h5>
                        <button wire:click='close' type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @livewire($type, compact('params'))
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
