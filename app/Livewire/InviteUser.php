<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Livewire\Forms\InviteUserForm;

use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\DB;

use App\Models\DocumentType;
use App\Models\Profession;
use App\Models\Gender;
use App\Models\Brigade;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\BloodType;
use App\Models\User;

class InviteUser extends Component
{

    public array $document_types;
    public array $professions;
    public array $genders;
    public array $brigades;
    public array $countries;
    public array $states;
    public array $cities;
    public array $blood_types;

    public InviteUserForm $form;

    public function updated ( string $field ) : void
    {
        $this->validateOnly($field);
    }

    public function updatedFormCountryId ( string $value ) : void
    {
        $this->states = Country::find($value)->states->toArray();
        $this->cities = [];
    }

    public function updatedFormStateId ( string $value ) : void
    {
        $this->cities = State::find($value)->cities->toArray();
    }

    public function invite () : void 
    {

        try {

            $this->authorize('create', User::class);

            $data = $this->form->check();
            
            User::invite($data);

            $this->dispatch('success');
            $this->form->reset();

        } catch ( ValidationException $e ) {

            $this->dispatch('validation-error', $e->validator->messages()->get('*'));
            throw $e;
            

        } catch ( AuthorizationException $e ) {

            $this->dispatch('unauthorized');
            
        } catch ( \Exception $e) {     

            DB::rollback();
            $this->dispatch( 'error' );
            \Log::channel('appexeceptions')->error('Error inviting user',['user_id' => \Auth::id(), 
                                                                            'fullname' => \Auth::user()->fullname, 
                                                                            'module' => get_class($this), 
                                                                            'message' => $e->getMessage()
                                                                            ]);

        }
    }

    public function mount () : void 
    {

        $this->document_types = DocumentType::all()->toArray();
        $this->professions = Profession::all()->toArray();
        $this->genders = Gender::all()->toArray();
        $this->brigades = Brigade::all()->toArray();
        $this->countries = Country::all()->toArray();
        $this->blood_types = BloodType::all()->toArray();

    }

    #[Title('Invitar usuario')]
    public function render()
    {
        $this->authorize('create', User::class);
        return view('livewire.invite-user');
    }
}
