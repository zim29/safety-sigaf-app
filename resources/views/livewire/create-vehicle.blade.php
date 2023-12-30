<div>
    <x-card title="Creación de vehículo">
        <form wire:submit="create" autocomplete="off">
            <div class="row">
                {{-- vehicle placard --}}
                <div class="col-md-6 col-sm-12">
                    <x-input
                            id="form.placard"
                            wire:model.blur="form.placard"
                            aria-autocomplete="none"
                            label="Placa del vehículo"
                            tabindex="1"
                            autofocus
                    ></x-input>
                </div>
                {{-- end vehicle placard --}}

                {{-- trailer placard --}}
                <div class="col-md-6 col-sm-12">
                    <x-input
                            id="form.t_placard"
                            wire:model.blur="form.t_placard"
                            aria-autocomplete="none"
                            label="Placa del trailer"
                            tabindex="2"
                    ></x-input>
                </div>
                {{-- end trailer placard --}}

                {{-- brand --}}
                <div class="col-md-6 col-sm-12">
                    <x-select
                            id="form.vehicle_brand_id"
                            wire:model.blur="form.vehicle_brand_id"
                            aria-autocomplete="none"
                            label="Marca"
                            tabindex="3"
                            :options="$brands"
                    ></x-select>
                </div>
                {{-- end brand --}}

                {{-- color --}}
                <div class="col-md-6 col-sm-12">
                    <x-select
                            id="form.color_id"
                            wire:model.blur="form.color_id"
                            aria-autocomplete="none"
                            label="Color"
                            tabindex="4"
                            :options="$colors"
                    ></x-select>
                </div>
                {{-- end color --}}

                {{-- type --}}
                <div class="col-md-6 col-sm-12">
                    <x-select
                            id="form.vehicle_type_id"
                            wire:model.blur="form.vehicle_type_id"
                            aria-autocomplete="none"
                            label="Tipo de vehículo"
                            tabindex="5"
                            :options="$types"
                    ></x-select>
                </div>
                {{-- end type --}}

                {{-- model --}}
                <div class="col-md-6 col-sm-12">
                    <x-input
                            id="form.model"
                            wire:model.blur="form.model"
                            aria-autocomplete="none"
                            label="Modelo"
                            tabindex="6"
                    ></x-input>
                </div>
                {{-- end model --}}

                {{-- company --}}
                <div class="col-12">
                    <x-select
                            id="form.company_id"
                            wire:model.blur="form.company_id"
                            aria-autocomplete="none"
                            label="Empresa"
                            tabindex="7"
                            :options="$companies"
                    ></x-select>
                </div>
                {{-- end company --}}

                {{-- image --}}
                <div class="col-12">
                    <x-input
                            id="form.image"
                            wire:model.live="form.image"
                            aria-autocomplete="none"
                            label="Imagen"
                            tabindex="8"
                            type="file"
                            accept="image/*"
                    ></x-input>
                </div>

                <div class="col-12">
                    @if( $form->image )
                        <div class="text-center">
                            <img src=" {{ $form->image->temporaryUrl() }} " class="img-fluid rounded" alt="{{ __('imagén del vehículo') }}" width="150" height="150">
                        </div>
                    @endif
                </div>

                {{-- end image --}}


            </div>

            <div class="row mt-3">
                <div class="vstack">
                    <button type="submit" class="btn btn-success" tabindex="9">
                        {{ __('Crear vehículo') }}
                    </button>
                </div>
            </div>
        </form>
    </x-card>
</div>
