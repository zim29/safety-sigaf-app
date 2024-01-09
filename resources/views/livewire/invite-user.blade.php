<div>
    <x-card title="Invitar usuario">
        <form wire:submit="invite">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <x-input
                            label="Nombres"
                            tabindex="1"
                            autofocus
                            aria-autocomplete="none"
                            wire:model.change="form.name"
                            id="form.name"
                    ></x-input>
                </div>
                <div class="col-md-6 col-sm-12">
                    <x-input
                            label="Apellidos"
                            tabindex="2"
                            aria-autocomplete="none"
                            wire:model.change="form.surname"
                            id="form.surname"
                    ></x-input>
                </div>
                <div class="col-md-6 col-sm-12">
                    <x-input
                            label="Correo electrónico"
                            tabindex="3"
                            aria-autocomplete="none"
                            wire:model.change="form.email"
                            id="form.email"
                    ></x-input>
                </div>
                <div class="col-md-6 col-sm-12">
                    <x-input
                            label="Teléfono"
                            tabindex="4"
                            aria-autocomplete="none"
                            wire:model.change="form.phone"
                            id="form.phone"
                    ></x-input>
                </div>
                <div class="col-md-6 col-sm-12">
                    <x-select
                            label="Tipo de documento"
                            tabindex="7"
                            aria-autocomplete="none"
                            wire:model.change="form.document_type_id"
                            id="form.document_type_id"
                            :options="$document_types"
                    ></x-select>
                </div>
                <div class="col-md-6 col-sm-12">
                    <x-input
                            label="Número de documento o identificación"
                            tabindex="8"
                            aria-autocomplete="none"
                            wire:model.change="form.document_number"
                            id="form.document_number"
                    ></x-input>
                </div>
                <div class="col-md-6 col-sm-12">
                    <x-input
                            label="Fecha de nacimiento"
                            tabindex="9"
                            type="date"
                            aria-autocomplete="none"
                            wire:model.change="form.dob"
                            id="form.dob"
                    ></x-input>
                </div>
                <div class="col-md-6 col-sm-12">
                    <x-select
                            label="Profesión"
                            tabindex="10"
                            aria-autocomplete="none"
                            wire:model.change="form.profession_id"
                            id="form.profession_id"
                            :options="$professions"
                    ></x-select>
                </div>
                <div class="col-md-6 col-sm-12">
                    <x-select
                            label="Género"
                            tabindex="11"
                            aria-autocomplete="none"
                            wire:model.change="form.gender_id"
                            id="form.gender_id"
                            :options="$genders"
                    ></x-select>
                </div>
                <div class="col-md-6 col-sm-12">
                    <x-select
                            label="Brigada a la que pertenece"
                            tabindex="12"
                            aria-autocomplete="none"
                            wire:model.change="form.brigade_id"
                            id="form.brigade_id"
                            :options="$brigades"
                    ></x-select>
                </div>
                <div class="col-md-6 col-sm-12">
                    <x-input
                            label="Nombres y apellidos del contacto de emergencia"
                            tabindex="13"
                            aria-autocomplete="none"
                            wire:model.change="form.em_co_name"
                            id="form.em_co_name"
                    ></x-input>
                </div>
                <div class="col-md-6 col-sm-12">
                    <x-input
                            label="Teléfono del contacto de emergencia"
                            tabindex="14"
                            aria-autocomplete="none"
                            wire:model.change="form.em_co_phone"
                            id="form.em_co_phone"
                    ></x-input>
                </div>
                <div class="col-md-6 col-sm-12">
                    <x-select
                            label="Tipo de sangre"
                            tabindex="15"
                            aria-autocomplete="none"
                            wire:model.change="form.blood_type_id"
                            id="form.blood_type_id"
                            :options="$blood_types"
                    ></x-select>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <x-select
                                label="País"
                                tabindex="16"
                                aria-autocomplete="none"
                                wire:model.change="form.country_id"
                                id="form.country_id"
                                :options="$countries"
                        ></x-select>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <x-select
                                label="Departamento"
                                tabindex="17"
                                aria-autocomplete="none"
                                wire:model.change="form.state_id"
                                id="form.state_id"
                                :options="$states"
                        ></x-select>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <x-select
                                label="Ciudad"
                                tabindex="18"
                                aria-autocomplete="none"
                                wire:model.change="form.city_id"
                                id="form.city_id"
                                :options="$cities"
                        ></x-select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <button class="btn btn-success btn-lg w-100" type="submit"> {{ __('Invitar usuario') }} </button>
                </div>    
            </div>

        </form>
    </x-card>
</div>
