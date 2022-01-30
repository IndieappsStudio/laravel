<?php

namespace App\Http\Livewire\Pages;

use App\Http\Livewire\Traits\InteractsWithModal;
use App\Http\Livewire\Traits\InteractsWithToast;
use Livewire\Component;

class Dashboard extends Component
{
    use InteractsWithModal, InteractsWithToast;

    public function render()
    {
        return view('livewire.pages.dashboard');
    }

    public function delete()
    {
        $this->openModal('Delete Confirmation', 'modals.delete-modal');
    }

    public function message()
    {
        $this->toast('Notification', 'Hello this is notification');
    }
}
