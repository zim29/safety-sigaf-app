<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class InviteUserForm extends Form
{

    public string $name = '';
    public string $surname = '';
    public string $email = '';
    public string $document_type_id = '';
    public string $document_number = '';
    public string $phone_number = '';
    public string $dob = '';
    public string $profession_id = '';
    public string $brigade_id = '';
    public string $gender_id = '';
    public string $blood_type_id = '';
    public string $allergies = '';
    public string $country_id = '';
    public string $state_id = '';
    public string $city_id = '';
    public string $em_co_name = '';
    public string $em_co_phone = '';

    public function rules () : array
    {
        return [
            'name' => [ 'required', 'string', 'min:3', 'max:50', ],
            'surname' => [ 'required', 'string', 'min:3', 'max:50', ],
            'email' => [ 'nullable', 'email', 'string', 'min:3', 'max:255', 'unique:users,email', ],
            'document_type_id' => [ 'nullable', 'integer', 'exists:document_types,id', ],
            'document_number' => [ 'nullable', 'string', 'min:3', 'max:255', 'unique:users,document_number', ],
            'phone_number' => [ 'nullable', 'string', 'min:3', 'max:20', ],
            'dob' => [ 'nullable', 'string', 'date', ],
            'profession_id' => [ 'nullable', 'integer', 'exists:professions,id', ],
            'brigade_id' => [ 'nullable', 'integer', 'exists:brigades,id', ],
            'gender_id' => [ 'nullable', 'integer', 'exists:genders,id', ],
            'blood_type_id' => [ 'nullable', 'integer', 'exists:blood_types,id', ],
            'city_id' => [ 'nullable', 'integer', 'exists:cities,id', ],
            'em_co_name' => [ 'nullable', 'string', 'min:3', 'max:100', ],
            'em_co_phone' => [ 'nullable', 'string', 'min:3', 'max:20', ],
        ];
    }

    public function check () : array 
    {

        return $this->validate();

    }
}
