<div>
    <x-card title="{{ __('Configuración de tokens') }}">

            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">

                @if ($showingConfirmation)
                    {{ __('Finaliza la configuración de App Token.') }}
                @else
                    {{ __('Configurar App Token.') }}
                @endif
            </h3>

            <div class="mt-3 max-w-xl text-sm text-gray-600 dark:text-gray-400">
                <p>
                    {{ __('Cuando esta opción esta habilitada, se te solicitará el codigo del token provisto por la apliación.') }}
                </p>
            </div>

                @if ($showingQrCode)
                    <div class="mt-4 max-w-xl text-sm text-gray-600 dark:text-gray-400">
                        <p class="font-semibold">
                            @if ($showingConfirmation)
                                {{ __('Para terminar de habilitar el token, escanee el siguiente código QR con la aplicación de autenticación de su teléfono o ingrese la clave de configuración y proporcione el código OTP generado.') }}
                            @else
                                {{ __('El token ahora está habilitada. Escanee el siguiente código QR usando la aplicación de autenticación de su teléfono o ingrese la clave de configuración.') }}
                            @endif
                        </p>
                    </div>

                    <div class="mt-4 p-2 inline-block bg-white">
                        {!! $this->user->tokenQrCodeSvg() !!}
                    </div>

                    <div class="mt-4 max-w-xl text-sm text-gray-600 dark:text-gray-400">
                        <p class="font-semibold">
                            {{ __('Clave de configuración') }}: {{ decrypt($this->user->token_secret) }}
                        </p>
                    </div>

                    @if ($showingConfirmation)
                        <div class="mt-4">
                            <x-input id="code" label="code" type="text" name="code" class="block mt-1 w-1/2" inputmode="numeric" autofocus autocomplete="one-time-code"
                                wire:model="code"
                                wire:keydown.enter="confirmTokenAuthentication" />

                        </div>
                    @endif
                @endif

                @if ($showingRecoveryCodes)
                    <div class="mt-4 max-w-xl text-sm text-gray-600 dark:text-gray-400">
                        <p class="font-semibold">
                            {{ __('Guarde estos códigos de recuperación en un administrador de contraseñas seguro. Se pueden usar para recuperar el acceso a su cuenta si pierde su dispositivo token.') }}
                        </p>
                    </div>

                    <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 dark:bg-gray-900 dark:text-gray-100 rounded-lg">
                        @foreach (json_decode(decrypt($this->user->token_recovery_codes), true) as $code)
                            <div>{{ $code }}</div>
                        @endforeach
                    </div>
                @endif

            <div class="mt-5">
                @if (! $this->enabled)
                    <x-confirms-password wire:then="enableTokenAuthentication">
                        <button class="btn btn-success btn-lg w-25" wire:loading.attr="disabled" >
                            {{ __('Habilitar') }}
                        </button>
                    </x-confirms-password>
                @else
                    @if ($showingRecoveryCodes)
                        <x-confirms-password wire:then="regenerateRecoveryCodes">
                            <button class="btn btn-success btn-lg w-25">
                                {{ __('Generar nuevos códigos') }}
                            </button>
                        </x-confirms-password>
                    @elseif ($showingConfirmation)
                        <x-confirms-password wire:then="confirmTokenAuthentication">
                            <button type="button" class="btn btn-success btn-lg w-25" wire:loading.attr="disabled">
                                {{ __('Confirmar') }}
                            </button>
                        </x-confirms-password>
                    @else
                        <x-confirms-password wire:then="showRecoveryCodes">
                            <button class="btn btn-success btn-lg w-25">
                                {{ __('Mostrar códigos de recuperación') }}
                            </button>
                        </x-confirms-password>
                    @endif

                    @if ($showingConfirmation)
                        <x-confirms-password wire:then="disableTokenAuthentication">
                            <button class="btn btn-warning btn-lg w-25" wire:loading.attr="disabled">
                                {{ __('Cancelar') }}
                            </button>
                        </x-confirms-password>
                    @else
                        <x-confirms-password wire:then="disableTokenAuthentication">
                            <button class="btn btn-danger btn-lg w-25" wire:loading.attr="disabled">
                                {{ __('Desvincular Token') }}
                            </button>
                        </x-confirms-password>
                    @endif

                @endif
            </div>
    </x-card>
</div>
