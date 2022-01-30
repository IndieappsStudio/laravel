<div>
    @if ($isOpen)
        <div class="modal fade" id="baseModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="baseModalLabel" aria-hidden="true">
            <div class="modal-dialog  {{$modalSize}}" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="baseModalLabel">{{ $title }}</h5>
                        <button wire:click='close' type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="material-icons">close</i>
                        </button>
                    </div>
                    <div class="modal-body mb-3">
                        @livewire($type, compact('params'))
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
