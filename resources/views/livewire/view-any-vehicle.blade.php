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
                        <x-table.cell> {{ $vehicle->company->name }} </x-table.cell>
                        <x-table.cell> 
                            <div class="hstack gap-1">
                                <a class="btn btn-primary w-100" href="#"> {{ __('Ver') }} </a>
                                <a class="btn btn-info w-100" href="#"> {{ __('Traspaso') }} </a>
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

</div>