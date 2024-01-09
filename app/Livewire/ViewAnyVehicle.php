<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\On;

use App\Traits\WithSort;
use App\Traits\WithSearch;

use Illuminate\Database\Eloquent\Builder;
use App\Exports\VehicleExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Vehicle;

class ViewAnyVehicle extends Component
{

    use WithPagination;
    use WithSort;
    use WithSearch;

    public bool $onlyManegableVehicles = true;


    public function updatedOnlyManegableVehicles () : void 
    {
        $this->resetPage();
    }


    public function vehicleTransfer( \App\Models\Vehicle $vehicle ) : void 
    {
        $this->dispatch('transfer-vehicle-request', vehicle: $vehicle);
    }

    public function vehicleUnlink( \App\Models\Vehicle $vehicle ) : void 
    {
        $this->dispatch('unlink-vehicle-request', vehicle: $vehicle);
    }

    public function vehicleLink( \App\Models\Vehicle $vehicle ) : void 
    {
        $this->dispatch('link-vehicle-request', vehicle: $vehicle);
    }

    public function exportToXLSX () : mixed 
    {
        return (new VehicleExport($this->getVehicleList()))->download(__('Listado de vehículos') .'.xlsx');
    }

    public function exportToPDF () : mixed 
    {
        return Excel::download(new VehicleExport($this->getVehicleList()), __('Listado de vehículos') .'.pdf', "CustomPdf");
    }

    public function getVehicleList () : Builder
    {
        $vehicles = Vehicle::search($this->searchType, $this->searchField, $this->searchValue);

        if($this->onlyManegableVehicles) $vehicles = $vehicles->manegableVehiclesByAuth();

        $vehicles = $vehicles->sortBy($this->sortField, $this->sortDirection)
                                ->with(['company', 'type']);

        return $vehicles;
    }

    public function mount () : void 
    {
        $this->vehicles = Vehicle::all();

        $this->fields = [
            ['id' => 'placard', 'name' => 'Placa del vehículo', 'type' => 'exactMatch'],
            ['id' => 't_placard', 'name' => 'Placa del trailer', 'type' => 'exactMatch'],
            ['id' => 'type.name', 'name' => 'Tipo de vehículo', 'type' => 'startsWith'],
            ['id' => 'company.name', 'name' => 'Empresa', 'type' => 'startsWith'],
        ];
    }

    #[Title('Listar vehículos')]
    #[On('vehicle-updated')]
    public function render()
    {

        return view('livewire.view-any-vehicle', [
            'vehicles' => $this->getVehicleList()->paginate(10),
        ]);
    }
}
