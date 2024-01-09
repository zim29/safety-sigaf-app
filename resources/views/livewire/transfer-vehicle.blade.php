<div>
    <x-dialog-modal 
                    data-bs-backdrop="static"
                    id="transferVehicle" 
    >
        <x-slot name="title">
                {{ __('Solicitud de traspaso de vehículo') }}
        </x-slot>
        <x-slot name="content">
            <div class="mt-3">
                <h3 class="my-4 text-center"> {{ __('Datos del vehículo') }} </h3>
                @if($vehicle)
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
                                    value="{{$vehicle->company->name}}"
                            ></x-input>
                        </div>
                        {{-- end company --}}
                    </div>
                @endif

                <h3 class="my-4 text-center"> {{ __('Empresa que solicita el traspaso') }} </h3>
                <div class="row">
                    <div class="col-12">
                        <x-select
                                label="Empresa a transferir"
                                :options="$companies"
                                id="company_id"
                        ></x-select>
                    </div>
                </div>

            </div>
            
        </x-slot>

        <x-slot name="footer" >
            <div class="row w-100">
                <div class="col-12 hstack gap-1">
                    <button 
                            id="approveTransfer" 
                            class="btn btn-success w-100" 
                            data-bs-dismiss="modal"
                            wire:click="requestTransfer"
                    >
                        {{ __('Solicitar traspaso') }}
                    </button>

                    <button 
                            id="closeTransfer" 
                            class="btn btn-warning w-100" 
                            data-bs-dismiss="modal"

                    >
                        {{ __('Cerrar') }}
                    </button>
                </div>         
            </div>
        </x-slot>
    </x-dialog-modal>
</div>

@push('scripts')
    <script type="text/javascript">
        document.addEventListener('livewire:initialized', () => {
            @this.on('show-transfer-vehicle-modal', ( ) => {
                bootstrap.Modal.getOrCreateInstance(document.getElementById('transferVehicle')).show();
                document.getElementById('closeAlert').focus()
            })
        })
    </script>
@endpush