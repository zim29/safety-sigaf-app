<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

use App\Models\Vehicle;
use App\Models\Company;

class LinkVehicle extends Component
{

    public Vehicle | null $vehicle;
    public array $companies;

    public string $company_id = '';


    #[On('link-vehicle-request')]
    public function showLinkVehicleModal (Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
        $this->dispatch('show-link-vehicle-modal');
    }

    public function requestLink () : void
    {
        if( $this->vehicle->link( $this->company_id ) )
        {
            $this->dispatch('vehicle-updated');
            $this->dispatch('success');
        }
        else
            $this->dispatch('error');

        $this->reset('vehicle');
    }

    public function mount () : void 
    {
        $this->vehicle = null;
        $this->companies = \Auth::user()->getManegableCompanies()->get()->toArray();

        if( count($this->companies) === 1 ) 
            $this->company_id = $this->companies[0]['id'];
    }

    public function render()
    {
        return view('livewire.link-vehicle');
    }
}
