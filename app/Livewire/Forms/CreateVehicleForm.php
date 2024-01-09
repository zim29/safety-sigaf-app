<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateVehicleForm extends Form
{

    public string $placard = '';
    public string | null $t_placard;
    public string $color_id = '';
    public string $vehicle_brand_id = '';
    public string $vehicle_type_id = '';
    public string $company_id = '';
    public string $model = '';
    public $image;

    public function rules () : array
    {
        return [
            'placard' => ['required', 'unique:vehicles,placard', 'unique:vehicles,t_placard', 'min:5', 'max:6', 'string', ],
            't_placard' => ['nullable', 'unique:vehicles,placard', 'unique:vehicles,t_placard', 'min:5', 'max:6', 'string', ],
            'color_id' => ['required', 'exists:colors,id', 'integer', ],
            'vehicle_brand_id' => ['required', 'exists:vehicle_brands,id', 'integer', ],
            'vehicle_type_id' => ['required', 'exists:vehicle_types,id', 'integer', ],
            'company_id' => ['required', 'exists:companies,id', 'integer', ],
            'model' => ['required', 'min:3', 'max:30', 'string', ],
            'image' => ['required', 'image', 'max:2048'],
        ];
    }

    public function check () : array 
    {

        return $this->validate();

    }

    

}
