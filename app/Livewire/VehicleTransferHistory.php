<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Vehicle;

class VehicleTransferHistory extends Component
{

    public Vehicle $vehicle;

    #[On('show-vehicle-trasnfer-history')]
    public function showVehicleTransferHistoryModal (Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
        $this->dispatch('show-vehicle-transfer-history-modal');
    }

    public function render()
    {
        return view('livewire.vehicle-transfer-history');
    }
}
