<?php

namespace App\Traits;


use App\Contracts\TokenAuthenticationProvider;
use Illuminate\Validation\ValidationException;

trait ConfirmsToken
{
    /**
     * Indicates if the user's OTP is being confirmed.
     *
     * @var bool
     */
    public $confirmingOTP = false;

    /**
     * The ID of the operation being confirmed.
     *
     * @var string|null
     */
    public $confirmableId = null;

    /**
     * The user's typed OTP.
     *
     * @var string
     */
    public $confirmableOTP = '';

    /**
     * Start confirming the user's password.
     *
     * @param  string  $confirmableId
     * @return void
     */
    public function startConfirmingToken(string $confirmableId)
    {
        if(!\Auth::user()->token_secret)
        {
            $title = __('Token no habilitado');
            $message = __('Para utilizar este módulo, es necesario activar su token. Por favor, acceda a su perfil y seleccione la opción "Configuración" para proceder con la activación.');
            $this->dispatch('error', mainText: $title, message: $message);
            return;
        }

        $this->resetErrorBag();


        $this->confirmingOTP = true;
        $this->confirmableId = $confirmableId;
        $this->confirmableOTP = '';

        $this->dispatch('confirming-code');
    }

    /**
     * Stop confirming the user's password.
     *
     * @return void
     */
    public function stopConfirmingToken()
    {
        $this->confirmingOTP = false;
        $this->confirmableId = null;
        $this->confirmableOTP = '';
    }

    /**
     * Confirm the user's password.
     *
     * @return void
     */
    public function confirmCode() : void
    {
        if($this->confirmableOTP === '')
        {
            throw ValidationException::withMessages([
                'confirmableOTP' => [__('El campo de código no puede estar vacío.')],
            ]);
        }

        $isValidCode = app(
                    TokenAuthenticationProvider::class)
                        ->verify(\Auth::user()->token_secret, 
                                            $this->confirmableOTP );
        if( !$isValidCode )
        {
            throw ValidationException::withMessages([
                'confirmableOTP' => [__('Código inválido. Verfique que el codigo ingresado no esté próximo a vencer.')],
            ]);
        }

        $this->dispatch('token-confirmed',
            id: $this->confirmableId,
        );

        $this->stopConfirmingToken();
    }



}
