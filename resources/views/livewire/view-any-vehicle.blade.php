<div>
    <x-card title="Listado de vehículos">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <x-select
                            label="Buscar por"
                            :options="$fields"
                            wire:model.lazy="searchField"
                ></x-select>
            </div>
            <div class="col-md-4 col-sm-12">
                @if($searchField !== '')
                    <x-input
                                label="Valor a buscar"
                                wire:model.change="searchValue"
                    ></x-input>
                @endif
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-4 col-sm-12">
                <div class="custom-toggle-switch d-flex align-items-center h-100">
                    <input id="onlyManegableVehicles" wire:model.change="onlyManegableVehicles" type="checkbox" class="align-middle">
                    <label for="onlyManegableVehicles" class="label-primary"></label><span class="ms-3 align-bottom">{{ __('Mostrar solo vehículos de mi empresa') }}</span>
                </div>
            </div>

            <div class="col-md-8 col-sm-12">
                <div class="d-flex align-items-center gap-1">
                    <button class="btn btn-success label-btn rounded-pill " wire:click="exportToXLSX">
                        <i class="bi bi-filetype-xlsx label-btn-icon me-2 rounded-pill"></i>
                        {{ __('Exportar a ') }}  Excel
                    </button>
 
                    <button class="btn btn-danger label-btn rounded-pill " wire:click="exportToPDF">
                        <i class="bi bi-filetype-pdf label-btn-icon me-2 rounded-pill"></i>
                        {{ __('Exportar a ') }}  PDF
                    </button>

                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="custom-toggle-switch d-flex align-items-center ">
                    
                </div>
            </div>

        </div>
        <x-table>
            <x-slot name="head">
                <x-table.head sortable field='placard'>{{ __('Placa del vehículo') }}</x-table.head>
                <x-table.head sortable field='t_placard'>{{ __('Placa del trailer') }}</x-table.head>
                <x-table.head sortable field='type.name'>{{ __('Tipo de vehículo') }}</x-table.head>
                <x-table.head sortable field='company.name'>{{ __('Empresa') }}</x-table.head>
                <x-table.head>{{ __('Opciones') }}</x-table.head>
            </x-slot>

            <x-slot name="body">
                @foreach($vehicles as $vehicle)
                    <x-table.row>
                        <x-table.cell> {{ $vehicle->placard }} </x-table.cell>
                        <x-table.cell> {{ $vehicle->t_placard }} </x-table.cell>
                        <x-table.cell> {{ $vehicle->type->name }} </x-table.cell>
                        <x-table.cell> {{ $vehicle->company->name ?? __('Desvinculado') }} </x-table.cell>
                        <x-table.cell> 
                            <div class="hstack gap-1">
                                <a class="btn btn-primary w-100" href="{{ route( 'view-vehicle', $vehicle ) }}"> {{ __('Ver') }} </a>
                                @if( $vehicle->isManegableByAuth() )
                                    <a href="{{ route('edit-vehicle', $vehicle) }}" class="btn btn-success w-100"> {{ __('Editar') }} </a>
                                    <button class="btn btn-warning w-100" wire:click="$refresh"> {{ __('Desvincular') }} </button>
                                @else
                                    @if($vehicle->company_id)
                                        <button class="btn btn-info w-100" wire:click="vehicleTransfer({{ $vehicle->id }})"> {{ __('Traspaso') }} </button>
                                    @else
                                        <button class="btn btn-success w-100" wire:click="vehicleLink({{ $vehicle->id }})"> {{ __('Vincular') }} </button>
                                    @endif
                                @endif
                            </div> 
                        </x-table.cell>
                    </x-table.row>
                @endforeach
            </x-slot>
        </x-table>

        <div class="my-3">

            {{ $vehicles->links() }}
        </div>
    </x-card>
    @livewire('TransferVehicle')
    @livewire('UnlinkVehicle')
    @livewire('LinkVehicle')

</div>