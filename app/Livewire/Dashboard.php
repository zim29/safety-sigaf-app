<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

class Dashboard extends Component
{

    #[Title('Panel principal')]
    public function render()
    {
        return view('livewire.dashboard');
    }
}
