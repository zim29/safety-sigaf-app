<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

use App\Models\Vehicle;

class EditVehicleForm extends Form
{

    public string $color_id = '';
    public $image;

    public function rules () : array
    {
        return [
            'color_id' => ['required', 'exists:colors,id', 'integer', ],
            'image' => ['nullable', 'image', 'max:2048'],
        ];
    }

    public function setVehicle (Vehicle $vehicle) : void 
    {

        $this->color_id = $vehicle->color_id;

    }

    public function check () : array 
    {

        return $this->validate();

    }
}
