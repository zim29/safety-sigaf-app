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
                                {{ __('To finish enabling two factor authentication, scan the following QR code using your phone\'s authenticator application or enter the setup key and provide the generated OTP code.') }}
                            @else
                                {{ __('Two factor authentication is now enabled. Scan the following QR code using your phone\'s authenticator application or enter the setup key.') }}
                            @endif
                        </p>
                    </div>

                    <div class="mt-4 p-2 inline-block bg-white">
                        {!! $this->user->tokenQrCodeSvg() !!}
                    </div>

                    <div class="mt-4 max-w-xl text-sm text-gray-600 dark:text-gray-400">
                        <p class="font-semibold">
                            {{ __('Setup Key') }}: {{ decrypt($this->user->token_secret) }}
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
                            {{ __('Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.') }}
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
                            {{ __('Enable') }}
                        </button>
                    </x-confirms-password>
                @else
                    @if ($showingRecoveryCodes)
                        <x-confirms-password wire:then="regenerateRecoveryCodes">
                            <button class="btn btn-success btn-lg w-25">
                                {{ __('Regenerate Recovery Codes') }}
                            </button>
                        </x-confirms-password>
                    @elseif ($showingConfirmation)
                        <x-confirms-password wire:then="confirmTokenAuthentication">
                            <button type="button" class="btn btn-success btn-lg w-25" wire:loading.attr="disabled">
                                {{ __('Confirm') }}
                            </button>
                        </x-confirms-password>
                    @else
                        <x-confirms-password wire:then="showRecoveryCodes">
                            <button class="btn btn-success btn-lg w-25">
                                {{ __('Show Recovery Codes') }}
                            </button>
                        </x-confirms-password>
                    @endif

                    @if ($showingConfirmation)
                        <x-confirms-password wire:then="disableTokenAuthentication">
                            <button class="btn btn-warning btn-lg w-25" wire:loading.attr="disabled">
                                {{ __('Cancel') }}
                            </button>
                        </x-confirms-password>
                    @else
                        <x-confirms-password wire:then="disableTokenAuthentication">
                            <button class="btn btn-danger btn-lg w-25" wire:loading.attr="disabled">
                                {{ __('Disable') }}
                            </button>
                        </x-confirms-password>
                    @endif

                @endif
            </div>
    </x-card>
</div>
