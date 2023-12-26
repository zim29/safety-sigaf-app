<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

class Login extends Component
{

    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    public function rules () : array 
    {
        return [
            'email' => ['required', 'min:3', 'max:255', 'email', 'string'],
            'password' => ['required', 'min:3', 'max:255', 'string'],
        ];
    }

    public function updated (string $field) : void 
    {
        $this->validateOnly( $field );
    }

    public function login () : void 
    {
        $this->validate();

        $isValidUser =  \Auth::attempt([
                            'email' => $this->email,
                            'password' => $this->password,
                        ], $this->remember);

        if ( $isValidUser )
        {
            redirect()->intended('dashboard');
        }

        $this->addError( 'email', __('auth.failed') );
    }

    #[Title('Iniciar sesión')]
    public function render()
    {
        return view('livewire.login')
                ->layout('components.layouts.guest');
    }
}
