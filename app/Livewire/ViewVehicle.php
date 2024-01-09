<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\On;

use App\Models\Vehicle;

class ViewVehicle extends Component
{

    public Vehicle $vehicle;

    public function vehicleTransfer( ) : void 
    {
        $this->dispatch('transfer-vehicle-request', vehicle: $this->vehicle);
    }

    public function vehicleUnlink( ) : void 
    {
        $this->dispatch('unlink-vehicle-request', vehicle: $this->vehicle);
    }

    public function vehicleLink( ) : void 
    {
        $this->dispatch('link-vehicle-request', vehicle: $this->vehicle);
    }

    public function vehicleTransferHistory( ) : void 
    {
        $this->dispatch('vehicle-transfer-history', vehicle: $this->vehicle);
    }



    public function mount ( int $id ) : void
    {
        $this->vehicle = Vehicle::findOrFail( $id );
    }

    #[Title('Perfíl del vehículo')]
    #[On('vehicle-updated')]
    public function render()
    {
        return view('livewire.view-vehicle');
    }
}
