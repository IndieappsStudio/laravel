<?php

namespace App\Http\Livewire\Traits;

trait InteractsWithToast
{
    protected function toast(string $title, string $message)
    {
        $this->emitTo('components.toast', 'showToast', $title, $message);
    }

    protected function saveSuccess(string $title, string $message, bool $needHideModal=false, ?string $refreshEvent = null)
    {
        if($needHideModal) {
            $this->emit('hideBaseModal');
        }
        if($refreshEvent){
            $this->emit($refreshEvent);
        }
        $this->toast($title, $message);
    }
}
