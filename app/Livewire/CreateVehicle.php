<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Livewire\Forms\CreateVehicleForm;
use Livewire\WithFileUploads;

use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;

use App\Models\Vehicle;
use App\Models\VehicleBrand;
use App\Models\VehicleType;
use App\Models\Color;

class CreateVehicle extends Component
{   

    use WithFileUploads;

    protected Vehicle $vehicle;
    public array $brands;
    public array $colors;
    public array $types;
    public array $companies;

    public CreateVehicleForm $form;

    public function updated ( string $field ) : void 
    {
        $this->validateOnly( $field );
    }

    public function mount () : void
    {
        
        $this->brands = VehicleBrand::list();
        $this->colors = Color::list();
        $this->types = VehicleType::list();
        $this->companies = \Auth::user()->getManegableCompanies()->get()->toArray();

        if( count($this->companies) === 1 ) 
            $this->form->company_id = $this->companies[0]['id'];

    }

    public function create () : void
    {

        try {

            $this->authorize('create', Vehicle::class);

            $data = $this->form->check();
            

            $this->vehicle = Vehicle::create($data);

            if( $this->vehicle ) 
            {
                $this->form->image->storeAs('vehicle', $this->vehicle->id, 'public');
            }

            $this->dispatch('success');
            $this->form->reset();

        } catch ( ValidationException $e ) {

            $this->dispatch('validation-error', $e->validator->messages()->get('*'));
            throw $e;
            

        } catch ( AuthorizationException $e ) {

            $this->dispatch('unauthorized');
            
        } catch ( \Exception $e) {     

            $this->dispatch( 'error' );
            \Log::channel('appexeceptions')->error('Error creating vehicle',['user_id' => \Auth::id(), 
                                                                            'fullname' => \Auth::user()->fullname, 
                                                                            'module' => get_class($this), 
                                                                            'message' => $e->getMessage()
                                                                            ]);

        }
    }

    #[Title('Crear vehículo')]
    public function render()
    {   
        $this->authorize('create', Vehicle::class);

        return view('livewire.create-vehicle');
    }
}
