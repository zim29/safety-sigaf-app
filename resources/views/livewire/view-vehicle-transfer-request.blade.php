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
                    <img class="w-100 h-75 img-fluid rounded" height="h-100" src="{{ asset('storage/vehicle/'. $request->vehicle->id ) }}">
                </div>
                {{-- end image --}}
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="row">
                    
                    {{-- vehicle id --}}
                    <div class="col-12">
                        <x-input
                                id="request_id"
                                aria-autocomplete="none"
                                label="Número de solicitud"
                                tabindex="1"
                                disabled
                                value="{{$request->id}}"
                                autofocus
                        ></x-input>
                    </div>
                    {{-- end vehicle id --}}

                    {{-- vehicle placard --}}
                    <div class="col-md-6 col-sm-12">
                        <x-input
                                id="placard"
                                aria-autocomplete="none"
                                label="Placa del vehículo"
                                tabindex="1"
                                disabled
                                value="{{$request->vehicle->placard}}"
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
                                value="{{$request->vehicle->t_placard}}"
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
                                value="{{$request->vehicle->brand->name}}"
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
                                value="{{$request->vehicle->color->name}}"
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
                                value="{{$request->vehicle->type->name}}"
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
                                value="{{$request->vehicle->model}}"
                        ></x-input>
                    </div>
                    {{-- end model --}}

                    {{-- owner company --}}
                    <div class="col-12">
                        <x-input
                                id="company_id"
                                aria-autocomplete="none"
                                label="Empresa propietaria del vehículo"
                                tabindex="7"
                                disabled
                                value="{{$request->owner->name ?? __('Desvinculado')}}"
                        ></x-input>
                    </div>
                    {{-- end owner company --}}

                    {{-- owner company --}}
                    <div class="col-12">
                        <x-input
                                id="owner_id"
                                aria-autocomplete="none"
                                label="Empresa que solicita el vehículo"
                                tabindex="7"
                                disabled
                                value="{{$request->requester->name ?? __('Desvinculado')}}"
                        ></x-input>
                    </div>
                    {{-- end owner company --}}

                    {{-- owner status --}}
                    <div class="col-12">
                        <x-input
                                id="status"
                                aria-autocomplete="none"
                                label="Estado de la solicitud"
                                tabindex="7"
                                disabled
                                value="{{ __($request->status) }}"
                        ></x-input>
                    </div>
                    {{-- end owner status --}}

                </div>

                
                {{-- edit --}}
                <div class="col-12">
                    <div class="hstack gap-1">
                        @if($request->status === 'in_process' && Auth::user()->can('update', $this->request->vehicle))
                            <x-confirm-token wire:then="approve">
                                <button class="btn btn-success btn-lg w-100"> {{ __('Aprobar') }} </button>
                            </x-confirm-token>
                            <x-confirm-token wire:then="decline">
                                <button class="btn btn-warning btn-lg w-100" > {{ __('Rechazar') }} </button>
                            </x-confirm-token>
                            
                        @endif
                    </div>
                </div>
            </div>

        </div>

    </x-card>
</div>
