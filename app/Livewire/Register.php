<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Http\Request;

use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\DocumentType;

class Register extends Component
{

    public array $countries;
    public array $states;
    public array $cities;
    public array $documentTypes;
    public mixed $photo;

    public function mount (string $userData) : void 
    {
        parse_str($userData, $parsedData);
        
        $this->countries = Country::all()->toArray();
        $this->states = State::take(10)->get()->toArray();
        $this->cities = City::take(10)->get()->toArray();
        $this->documentTypes = DocumentType::all()->toArray();
    }

    #[Title( 'Registrarse' )]
    public function render()
    {
        return view('livewire.register')
                ->layout('components.layouts.guest');
    }
}
