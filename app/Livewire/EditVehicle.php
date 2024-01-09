<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use App\Livewire\Forms\EditVehicleForm;

use Illuminate\Support\Facades\DB;

use App\Models\Vehicle;
use App\Models\VehicleBrand;
use App\Models\VehicleType;
use App\Models\Color;

class EditVehicle extends Component
{

    use WithFileUploads;

    public Vehicle $vehicle;
    public EditVehicleForm $form;

    public array $brands;
    public array $colors;
    public array $types;
    public array $companies;

    #[On('success-modal-closed')]
    public function redirectToView ()
    {
        return redirect()->route('view-vehicle', $this->vehicle);
    }

    public function mount (int $id)
    {
        $this->vehicle = Vehicle::findOrFail( $id );

        $this->brands = VehicleBrand::list();
        $this->colors = Color::list();
        $this->types = VehicleType::list();
        $this->companies = \Auth::user()->getManegableCompanies()->get()->toArray();

        $this->form->setVehicle( $this->vehicle );


    }

    public function update () : void
    {
        DB::beginTransaction();

        try {

            $this->authorize('update', $this->vehicle);

            $data = $this->form->check();
            

            $this->vehicle->update($data);

            if( $this->vehicle && $this->vehicle->wasChanged()) 
            {
                
                DB::commit();
            }

            if( $this->form->image )
            {
                $this->form->image->storeAs('vehicle', $this->vehicle->id, 'public');                    
            }

            $this->dispatch('success');

        } catch ( ValidationException $e ) {

            $this->dispatch('validation-error', $e->validator->messages()->get('*'));
            throw $e;
            

        } catch ( AuthorizationException $e ) {

            $this->dispatch('unauthorized');
            
        } catch ( \Exception $e) {     

            DB::rollback();
            $this->dispatch( 'error' );
            \Log::channel('appexeceptions')->error('Error creating vehicle',['user_id' => \Auth::id(), 
                                                                            'fullname' => \Auth::user()->fullname, 
                                                                            'module' => get_class($this), 
                                                                            'message' => $e->getMessage()
                                                                            ]);

        }
    }

    #[Title('Editar vehículo')]
    public function render()
    {
        $this->authorize('update', $this->vehicle);
        return view('livewire.edit-vehicle');
    }
}
