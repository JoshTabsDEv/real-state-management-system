<?php

namespace App\Livewire;

use Livewire\Component;

class Sidebar extends Component
{
    public $isOpen = false; // State to control sidebar visibility

    public function toggleSidebar()
    {
        $this->isOpen = !$this->isOpen;
    }

    public function render()
    {
        return view('livewire.sidebar');
    }
}
