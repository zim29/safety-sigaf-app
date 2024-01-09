<div>
    <x-spinner></x-spinner>
    <x-offline-alert></x-offline-alert>
    <x-card title="Editar vehículo">

        <form wire:submit="update">
            <div class="row">
                <div class="col-md-6 col-sm-12 mb-3">
                    {{-- image --}}
                    <div class="col-12">
                        <img class="w-100 h-75 img-fluid rounded" height="h-100" src="{{ $form->image ? $form->image->temporaryUrl() : asset('storage/vehicle/'. $vehicle->id ) . '?id=' . rand()}}">
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
                                    disabled
                                    value="{{$vehicle->placard}}"
                            ></x-input>
                        </div>
                        {{-- end vehicle placard --}}

                        {{-- trailer placard --}}
                        <div class="col-md-6 col-sm-12">
                            <x-input
                                    id="t_placard"
                                    aria-autocomplete="none"
                                    label="Placa del trailer"
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
                                    disabled
                                    value="{{$vehicle->brand->name}}"
                            ></x-input>
                        </div>
                        {{-- end brand --}}

                        {{-- color --}}
                        <div class="col-md-6 col-sm-12">
                            <x-select
                                    id="color_id"
                                    aria-autocomplete="none"
                                    autofocus
                                    label="Color"
                                    tabindex="1"
                                    wire:model.change="form.color_id"
                                    :options="$colors"
                            ></x-select>
                        </div>
                        {{-- end color --}}

                        {{-- type --}}
                        <div class="col-md-6 col-sm-12">
                            <x-input
                                    id="vehicle_type_id"
                                    aria-autocomplete="none"
                                    label="Tipo de vehículo"
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
                                    disabled
                                    value="{{$vehicle->company->name}}"
                            ></x-input>
                        </div>
                        {{-- end company --}}

                        {{-- image --}}
                        <div class="col-12">
                            <x-input
                                    id="form.image"
                                    aria-autocomplete="none"
                                    type="file"
                                    accept="image/*"
                                    label="Imagen"
                                    tabindex="2"
                                    wire:model.change="form.image"
                            ></x-input>
                        </div>
                        {{-- end image --}}
                    </div>

                    
                    {{-- edit --}}
                    <div class="col-12">
                        <div class="vstack gap-1">
                            <button tabindex="3" class="btn btn-success btn-lg"> {{ __('Guardar cambios') }} </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </x-card>
</div>
