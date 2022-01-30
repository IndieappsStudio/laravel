<?php

namespace App\Http\Livewire\Traits;

trait InteractsWithModal
{
    protected function openModal(string $title, string $form, $params = [], ?string $modalSize = null)
    {
        $this->emitTo('components.modal', 'showModal', $title, $form, $params, $modalSize);
    }
}
