<div>
    <x-offline-alert></x-offline-alert>
    <x-spinner></x-spinner>
    <x-card title="Perfíl del vehículo">
        <div class="row mb-3">
            <div class="col-12">
                <a  href="{{ route('viewAny-vehicle') }}" class="btn btn-primary label-btn">
                    <i class="bi bi-arrow-left label-btn-icon me-2"></i>
                    {{ __('Ver listado de vehículos') }}
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 mb-3">
                {{-- image --}}
                <div class="col-12">
                    <img class="w-100 h-75 img-fluid rounded" height="h-100" src="{{ asset('storage/vehicle/'. $vehicle->id ) }}">
                </div>
                {{-- end image --}}
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="row">
                    
                    
                    {{-- vehicle placard --}}
                    <div class="col-md-6 col-sm-12">
                        <x-input
                                id="placard"
                                aria-autocomplete="none"
                                label="Placa del vehículo"
                                tabindex="1"
                                disabled
                                value="{{$vehicle->placard}}"
                                autofocus
                        ></x-input>
                    </div>
                    {{-- end vehicle placard --}}

                    {{-- trailer placard --}}
                    <div class="col-md-6 col-sm-12">
                        <x-input
                                id="t_placard"
                                aria-autocomplete="none"
                                label="Placa del trailer"
                                tabindex="2"
                                disabled
                                value="{{$vehicle->t_placard}}"
                        ></x-input>
                    </div>
                    {{-- end trailer placard --}}

                    {{-- brand --}}
                    <div class="col-md-6 col-sm-12">
                        <x-input
                                id="vehicle_brand_id"
                                aria-autocomplete="none"
                                label="Marca"
                                tabindex="3"
                                disabled
                                value="{{$vehicle->brand->name}}"
                        ></x-input>
                    </div>
                    {{-- end brand --}}

                    {{-- color --}}
                    <div class="col-md-6 col-sm-12">
                        <x-input
                                id="color_id"
                                aria-autocomplete="none"
                                label="Color"
                                tabindex="4"
                                disabled
                                value="{{$vehicle->color->name}}"
                        ></x-input>
                    </div>
                    {{-- end color --}}

                    {{-- type --}}
                    <div class="col-md-6 col-sm-12">
                        <x-input
                                id="vehicle_type_id"
                                aria-autocomplete="none"
                                label="Tipo de vehículo"
                                tabindex="5"
                                disabled
                                value="{{$vehicle->type->name}}"
                        ></x-input>
                    </div>
                    {{-- end type --}}

                    {{-- model --}}
                    <div class="col-md-6 col-sm-12">
                        <x-input
                                id="model"
                                aria-autocomplete="none"
                                label="Modelo"
                                tabindex="6"
                                disabled
                                value="{{$vehicle->model}}"
                        ></x-input>
                    </div>
                    {{-- end model --}}

                    {{-- company --}}
                    <div class="col-12">
                        <x-input
                                id="company_id"
                                aria-autocomplete="none"
                                label="Empresa"
                                tabindex="7"
                                disabled
                                value="{{$vehicle->company->name ?? __('Desvinculado')}}"
                        ></x-input>
                    </div>
                    {{-- end company --}}
                </div>

                
                {{-- edit --}}
                <div class="col-12">
                    <div class="vstack gap-1">
                        @if ($vehicle->isManegableByAuth())
                            <a href="{{ route('edit-vehicle', $vehicle) }}" class="btn btn-success btn-lg"> {{ __('Editar') }} </a>
                            {{-- <a href="{{ route('edit-vehicle', $vehicle) }}" class="btn btn-info btn-lg"> {{ __('Historial de traspasos') }} </a> --}}
                            <button class="btn btn-warning btn-lg" wire:click="vehicleUnlink"> {{ __('Desvincular') }} </button>
                        @else
                            @if($vehicle->company_id)
                                <button class="btn btn-info btn-lg" wire:click="vehicleTransfer"> {{ __('Solicitar traspaso') }} </button>
                            @else
                                <button class="btn btn-success btn-lg" wire:click="vehicleLink"> {{ __('Vincular') }} </button>
                            @endif
                        @endif
                    </div>
                </div>
            </div>

        </div>

    </x-card>

    @livewire('TransferVehicle')
    @livewire('UnlinkVehicle')
    @livewire('LinkVehicle')
    @livewire('VehicleTransferHistory')
</div>
