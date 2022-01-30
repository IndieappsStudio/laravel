<?php

namespace App\Http\Livewire\Components;

use Carbon\Carbon;
use Livewire\Component;

class Toast extends Component
{
    public $title = '';
    public $time = '';
    public $message = '';

    protected $listeners = ['showToast' => 'open'];

    public function open(string $title, string $message, ?string $time = null)
    {
        $this->title = $title;
        $this->message = $message;
        if($time) {
            $this->time = Carbon::now()->diffForHumans();
        } else {
            $this->time = Carbon::parse($time)->diffForHumans();
        }

        $this->emit('showBaseToast');
    }

    public function render()
    {
        return view('livewire.components.toast');
    }
}
