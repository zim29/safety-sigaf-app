<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

use App\Models\Vehicle;

class TransferVehicle extends Component
{

    public Vehicle $vehicle;
    public array $companies;

    public string $company_id = '';


    #[On('transfer-vehicle-request')]
    public function showTransferVehicleModal (Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
        $this->dispatch('show-transfer-vehicle-modal');
    }

    public function requestTransfer () : void
    {
        if( $this->vehicle->requestTransfer( $this->company_id, '' ) )
            $this->dispatch('success');
        else
            $this->dispatch('error');

        $this->reset('vehicle');
    }

    public function mount () : void 
    {
        $this->companies = \Auth::user()->getManegableCompanies()->get()->toArray();

        if( count($this->companies) === 1 ) 
            $this->company_id = $this->companies[0]['id'];
    }

    public function render()
    {
        return view('livewire.transfer-vehicle');
    }
}
