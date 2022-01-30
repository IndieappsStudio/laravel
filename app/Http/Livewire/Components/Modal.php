<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Modal extends Component
{
    public $isOpen = false;
    public $title = '';
    public $type = '';
    public $params = [];
    public $modalSize = 'md:max-w-xl';

    protected $listeners = ['showModal' => 'open', 'closeModal' => 'close'];

    public function open(string $title, string $type, array $params = [], ?string $modalSize = null)
    {
        $this->isOpen = true;
        $this->title = $title;
        $this->type = $type;
        $this->params = $params;
        if($modalSize) {
            $this->modalSize = $modalSize;
        } else {
            $this->modalSize = 'md:max-w-xl';
        }
        $this->emit('showBaseModal');
    }

    public function close()
    {
        $this->isOpen = false;
        $this->emit('hideBaseModal');
    }

    public function render()
    {
        return view('livewire.components.modal');
    }
}
