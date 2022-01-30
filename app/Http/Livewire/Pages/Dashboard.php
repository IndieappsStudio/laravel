<?php

namespace App\Http\Livewire\Pages;

use App\Http\Livewire\Traits\InteractsWithModal;
use Livewire\Component;

class Dashboard extends Component
{
    use InteractsWithModal;

    public function render()
    {
        return view('livewire.pages.dashboard');
    }

    public function delete()
    {
        $this->openModal('Delete Confirmation', 'modals.delete-modal');
    }
}
