<div>
    
    <div class="card custom-card">
        <div class="card-body p-5">
            <p class="h5 fw-semibold mb-2 text-center">{{ __('Solicitud de registro de nuevo usuario') }}</p>
            <p class="mb-5 text-muted op-7 fw-normal text-center"> {{ __('Por favor, rellene los siguientes campos con sus datos actualizados.') }} </p>
            <form wire:submit="register">
                <div class="row gy-3">
                    <div class="col-md-6 col-sm-12">
                        <x-input 
                                id="name" 
                                wire:model.live="name" 
                                autofocus
                                tabindex="1"
                                type="text"
                                onkeypress="validateInput(event, '^[a-zA-ZñÑ ]$')" 
                                class="form-control-lg" 
                                autocomplete="given-name"
                                label="Nombres">
                        </x-input>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <x-input 
                                id="surname" 
                                wire:model.live="surname" 
                                tabindex="2"
                                type="text" 
                                onkeypress="validateInput(event, '^[a-zA-ZñÑ ]$')"
                                class="{{ $errors->has('surname') ? 'is-invalid' : '' }} form-control-lg" 
                                autocomplete="family-name"
                                label=" Apellidos ">
                        </x-input>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <x-input 
                                id="email" 
                                wire:model.live="email" 
                                tabindex="3"
                                type="text" 
                                class="{{ $errors->has('email') ? 'is-invalid' : '' }} form-control-lg" 
                                autocomplete="username"
                                label=" Correo electrónico ">
                        </x-input>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <x-input 
                                id="phone_number" 
                                wire:model.live="phone_number" 
                                tabindex="4"
                                type="text" 
                                class="{{ $errors->has('phone_number') ? 'is-invalid' : '' }} form-control-lg" 
                                autocomplete="tel-national"
                                label=" Teléfono ">
                        </x-input>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <x-input
                                id="passwordUnhached"
                                label=" Contraseña " 
                                type="password" 
                                class="{{ $errors->has('passwordUnhached') ? 'is-invalid' : '' }} form-control-lg"
                                tabindex="5"
                                autocomplete="new-password"
                                wire:model.live="passwordUnhached"
                        ></x-input>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <x-input
                                id="passwordConfirmation"
                                label=" Confirmar contraseña " 
                                type="password" 
                                class="{{ $errors->has('passwordConfirmation') ? 'is-invalid' : '' }} form-control-lg"
                                tabindex="5"
                                autocomplete="new-password"
                                wire:model.live="passwordConfirmation"
                        ></x-input>
                    </div>
                
                    <div class="col-md-6 col-sm-12">
                        <x-select 
                                id="document_type_id" 
                                wire:model.live="document_type_id" 
                                tabindex="6"
                                autocomplete="off"
                                class="{{ $errors->has('document_type_id') ? 'is-invalid' : '' }} form-select-lg" 
                                label=" Tipo de documento ">
                        </x-select>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <x-input 
                                id="document_number" 
                                wire:model.live="document_number" 
                                tabindex="7"
                                type="text"
                                onkeypress="validateInput(event, '^[a-zA-Z0-9]')" 
                                class="{{ $errors->has('document_number') ? 'is-invalid' : '' }} form-control-lg" 
                                autocomplete="off"
                                label=" Número de documento o identificación ">
                        </x-input>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <x-input 
                                id="dob" 
                                wire:model.live="dob" 
                                tabindex="8"
                                type="date" 
                                class="{{ $errors->has('dob') ? 'is-invalid' : '' }} form-control-lg" 
                                autocomplete="bday"
                                label=" Fecha de nacimiento ">
                        </x-input>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <x-select 
                                id="profession_id" 
                                wire:model.live="profession_id" 
                                tabindex="9"
                                class="{{ $errors->has('profession_id') ? 'is-invalid' : '' }} form-select-lg" 
                                autocomplete="off"
                                label=" Profesión ">
                        </x-select>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <x-select 
                                id="gender_id" 
                                wire:model.live="gender_id" 
                                tabindex="10"
                                class="{{ $errors->has('gender_id') ? 'is-invalid' : '' }} form-select-lg" 
                                autocomplete="off"
                                label=" Género ">
                        </x-select>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <x-select 
                                id="brigade_id" 
                                wire:model.live="brigade_id" 
                                tabindex="11"
                                class="{{ $errors->has('brigade_id') ? 'is-invalid' : '' }} form-select-lg" 
                                autocomplete="off"
                                label=" Brigada de emergencia a la que pertenece ">
                        </x-select>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <x-input 
                                id="emergency_contact_name" 
                                wire:model.live="emergency_contact_name" 
                                tabindex="12"
                                type="text" 
                                class="{{ $errors->has('emergency_contact_name') ? 'is-invalid' : '' }} form-control-lg" 
                                autocomplete="off"
                                aria-autocomplete="none"
                                onkeypress="validateInput(event, '^[a-zA-ZñÑ ]$')"
                                label=" Nombres y Apellidos del contacto de emergencia ">
                        </x-input>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <x-input 
                                id="emergency_contact_phone" 
                                wire:model.live="emergency_contact_phone" 
                                tabindex="13"
                                type="text" 
                                class="{{ $errors->has('emergency_contact_phone') ? 'is-invalid' : '' }} form-control-lg"
                                autocomplete="off" 
                                aria-autocomplete="none" 
                                onkeypress="validateInput(event, '[0-9]')"
                                label=" Número de teléfono del contacto de emergencia ">
                        </x-input>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <x-select
                                id="blood_type_id" 
                                wire:model.live="blood_type_id" 
                                tabindex="11"
                                class="{{ $errors->has('blood_type_id') ? 'is-invalid' : '' }} form-select-lg" 
                                autocomplete="off"
                                label=" Tipo de sangre "
                        ></x-select>
                    </div>

                    <div class="col-12">
                        <x-textarea 
                                id="allergies" 
                                wire:model.live="allergies" 
                                tabindex="14"
                                rows="10"
                                style="height: 7rem; padding-top: 3rem;"
                                class="{{ $errors->has('allergies') ? 'is-invalid' : '' }} form-control-lg" 
                                autocomplete="off"
                                label=" Eres alérgico a (en caso de NO presentar alergías dejar campo vacío): ">
                        </x-textarea>
                    </div>
                    <div class="col-12 row">
                        <div class="col-md-4 col-sm-12">
                            <x-select 
                                id="country_id" 
                                label=" Pais " 
                                wire:model.change="country_id"
                                tabindex="15"
                                :options="$this->countries" 
                                autocomplete="off">
                            </x-select>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <x-select 
                                id="state_id" 
                                label=" Departamento " 
                                wire:model.change="state_id"
                                :options="$this->states" 
                                tabindex="16">
                            </x-select>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <x-select 
                                id="city_id" 
                                class="{{ $errors->has('city_id') ? 'is-invalid' : '' }} form-select-lg" 
                                label=" Ciudad " 
                                wire:model.change="city_id"
                                :options="$this->cities"
                                tabindex="17">
                            </x-select>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <x-input 
                            id="photo" 
                            type="file"
                            class="{{ $errors->has('photo') ? 'is-invalid' : '' }} form-select-lg" 
                            accept="image/*"
                            label=" Fotografía " 
                            wire:model.live="photo"
                            value="Carge su foto de perfíl"
                            tabindex="18">
                        </x-input>

                        @if ($photo) 
                        <div class="text-center">
                            <img src="{{ $photo->temporaryUrl() }}" class="img-thumbnail" alt="..." style="width: 200px; height: 200px">
                        </div>
                        @endif
                    </div>

                    <div class="form-check mt-3">
                        <input class="form-check-input @error('terms') is-invalid @enderror " type="checkbox" id="terms" wire:model.change="terms" tabindex="19">
                        <label class="form-check-label text-muted fw-normal " for="terms">
                            Al crear una cuenta en {{ config('app.name') }} confirmo estar de acuerdo y haber leído los <a data-bs-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#terms-modal" href="#terms-modal" class="text-success"><u>Términos y condiciones</u></a> y <a data-bs-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#privacy" href="#privacy" class="text-success"><u>Políticas de privacidad</u></a>
                        </label>
                        @error('terms')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-sm-12 d-grid mt-2">
                        <button tabindex="20" type="submit" class="btn btn-lg btn-primary"> {{ __('Registrarse') }} </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Log Out Other Devices Confirmation Modal -->
    <x-dialog-modal  id="privacy">
        <x-slot name="title">
            {{ __('PRIVACIDAD DE DATOS') }}
        </x-slot>

        <x-slot name="content">
            <div class="w-100">
                <p>Bypaul se compromete a proteger el derecho de cualquier persona a controlar su propia información personal y a decidir al respecto.</p>

                <p>La privacidad de los datos es un principio clave de nuestro Código de Integridad.</p>

                <p>By paul y sus empleados deben adquirir y mantener los datos personales solo en la medida necesaria para el funcionamiento eficaz de la empresa o para cumplir con los requisitos legales.</p>

                <p>Nuestra Política de privacidad de datos regula la forma en que recopilamos, utilizamos y gestionamos los datos personales. Además, hemos desarrollado un marco de gestión que nos permite gestionar los datos personales de forma coherente con la Política de privacidad de datos.</p>

                <p>Nuestros oficiales de protección de datos brindan asesoramiento continuo, identifican los riesgos de privacidad, desarrollan políticas sobre temas específicos y capacitan a los empleados en materia de privacidad de datos.</p>

                <p>La privacidad de los datos también debe tenerse en cuenta al desarrollar nuevos servicios o procesos. Al seguir el enfoque de privacidad desde el diseño, pretendemos evitar el enfoque de «recopilar primero y preguntar después» en lo que respecta a los datos personales.</p>

            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="vstack">
                <a data-bs-dismiss="modal" class="btn btn-light" >
                    {{ __('Cerrar') }}
                </a>
            </div>
        </x-slot>
    </x-dialog-modal>

    <x-dialog-modal  id="terms-modal">
        <x-slot name="title">
            {{ __('TÉRMINOS Y CONDICIONES') }}
        </x-slot>

        <x-slot name="content">
            <div class="w-100">
                <p>Bypaul se compromete a proteger el derecho de cualquier persona a controlar su propia información personal y a decidir al respecto.</p>

                <p>La privacidad de los datos es un principio clave de nuestro Código de Integridad.</p>

                <p>By paul y sus empleados deben adquirir y mantener los datos personales solo en la medida necesaria para el funcionamiento eficaz de la empresa o para cumplir con los requisitos legales.</p>

                <p>Nuestra Política de privacidad de datos regula la forma en que recopilamos, utilizamos y gestionamos los datos personales. Además, hemos desarrollado un marco de gestión que nos permite gestionar los datos personales de forma coherente con la Política de privacidad de datos.</p>

                <p>Nuestros oficiales de protección de datos brindan asesoramiento continuo, identifican los riesgos de privacidad, desarrollan políticas sobre temas específicos y capacitan a los empleados en materia de privacidad de datos.</p>

                <p>La privacidad de los datos también debe tenerse en cuenta al desarrollar nuevos servicios o procesos. Al seguir el enfoque de privacidad desde el diseño, pretendemos evitar el enfoque de «recopilar primero y preguntar después» en lo que respecta a los datos personales.</p>

            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="vstack">
                <a data-bs-dismiss="modal" class="btn btn-light" >
                    {{ __('Cerrar') }}
                </a>
            </div>
        </x-slot>
    </x-dialog-modal>

</div>

