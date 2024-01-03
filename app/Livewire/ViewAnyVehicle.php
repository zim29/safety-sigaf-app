<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

use App\Traits\WithSort;
use App\Traits\WithSearch;

use Illuminate\Database\Eloquent\Collection;

use App\Models\Vehicle;

class ViewAnyVehicle extends Component
{

    use WithPagination;
    use WithSort;
    use WithSearch;

    protected $queryString = [
            'page' => ['except' => 1], // Excluir 'page' de la URL
        ];

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
    public function render()
    {
        $vehicles = Vehicle::query()->search($this->searchType, $this->searchField, $this->searchValue);

        // dd($vehicles->toSql(), $vehicles->getBindings());

        return view('livewire.view-any-vehicle', [
            'vehicles' => $vehicles->sortBy($this->sortField, $this->sortDirection)->with(['company', 'type'])->paginate(10),
        ]);
    }
}
