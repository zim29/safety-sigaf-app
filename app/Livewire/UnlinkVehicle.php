<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

use App\Models\Vehicle;

class UnlinkVehicle extends Component
{

    public Vehicle | null $vehicle = null;


    #[On('unlink-vehicle-request')]
    public function showUnlinkVehicleModal (Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
        $this->dispatch('show-unlink-vehicle-modal');
    }

    public function requestUnlink () : void
    {
        if( $this->vehicle->unlink(  ) )
        {
            $this->dispatch('success');
            $this->dispatch('vehicle-updated');
        } 
        else
            $this->dispatch('error');


        $this->reset('vehicle');
    }

    public function render()
    {
        return view('livewire.unlink-vehicle');
    }
}
