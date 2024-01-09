<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

use App\Models\User;

class UserProfile extends Component
{

    public User $user;

    public function mount ( int $id) : void 
    {
        $this->user = User::findOrFail($id);
    }

    #[Title('Perfíl del usuario')]
    public function render()
    {
        $this->authorize('update', $this->user);    
        return view('livewire.user-profile');
    }
}
