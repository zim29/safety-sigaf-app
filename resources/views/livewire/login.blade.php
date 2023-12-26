<div>
    <div class="card custom-card">
        <div class="card-body p-5">
            <p class="h5 fw-semibold mb-2 text-center">{{ __('Iniciar sesión') }}</p>
            <p class="mb-4 text-muted op-7 fw-normal text-center"></p>
            <div class="row gy-3">
                <form wire:submit="login">
                    <div class="col-xl-12">
                        <x-input 
                                id="email" 
                                wire:model.change="email" 
                                autofocus
                                tabindex="1"
                                class="form-control-lg" 
                                autocomplete="username"
                                label="Correo electrónico"
                                maxlength="255"
                        >
                        </x-input>
                    </div>
                    <div class="col-xl-12 mb-2">
                        <x-input
                                    id="password"
                                    label="Contraseña" 
                                    type="password" 
                                    class="form-control-lg"
                                    tabindex="2"
                                    autocomplete="current-password"
                                    wire:model.change="password"
                                    maxlength="255"
                        ></x-input>
                        <div class="mt-2">
                            <div class="form-check">
                                <x-checkbox 
                                            wire:model="remember" 
                                            tabindex="3" 
                                            id="remember" 
                                            label="¿Recordar usuario?"
                                ></x-checkbox>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 d-grid mt-2">
                        <button tabindex="4" type="submit" class="btn btn-lg btn-primary">{{ __('Iniciar sesión') }}</button>
                    </div>
                </form>
            </div>
            <div class="text-center">
                <p class="fs-12 text-muted mt-3"><a href="{{-- {{ route('register') }} --}}" class="text-primary">{{ __('¿Olvidaste tu contraseña?') }}</a></p>
                <p class="fs-12 text-muted mt-3">{{ __('No tienes una cuenta?') }}<a href="{{ route('register') }}" class="text-primary">{{ __('Regístrate') }}</a></p>
            </div>
        </div>
    </div>
</div>
