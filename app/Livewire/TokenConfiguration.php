<?php

namespace App\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use App\Actions\ConfirmTokenAuthentication;
use App\Actions\DisableTokenAuthentication;
use App\Actions\EnableTokenAuthentication;
use App\Actions\GenerateNewRecoveryCodes;

use App\Contracts\TokenAuthenticationProvider;

use App\Traits\ConfirmsPasswords;

class TokenConfiguration extends Component
{

    use ConfirmsPasswords;

    /**
     * Indicates if token authentication QR code is being displayed.
     *
     * @var bool
     */
    public $showingQrCode = false;

    /**
     * Indicates if the token authentication confirmation input and button are being displayed.
     *
     * @var bool
     */
    public $showingConfirmation = false;

    /**
     * Indicates if token authentication recovery codes are being displayed.
     *
     * @var bool
     */
    public $showingRecoveryCodes = false;

    /**
     * The OTP code for confirming token authentication.
     *
     * @var string|null
     */
    public $code;

    /**
     * Mount the component.
     *
     * @return void
     */
    public function mount()
    {       
    }

    /**
     * Enable token authentication for the user.
     *
     * @param  \Laravel\Fortify\Actions\EnableTokenAuthentication  $enable
     * @return void
     */
    public function enableTokenAuthentication( )
    {

        $this->ensurePasswordIsConfirmed(); 

        $enable = new EnableTokenAuthentication( app('provider') );
        $enable(\Auth::user());

        $this->showingQrCode = true;

        $this->showingConfirmation = true; 
        if (true) {
            $this->showingConfirmation = true;
        }
        else 
        {
            $this->showingRecoveryCodes = true;
        }

    }

    /**
     * Confirm token authentication for the user.
     *
     * @param  \Laravel\Fortify\Actions\ConfirmTokenAuthentication  $confirm
     * @return void
     */
    public function confirmTokenAuthentication( )
    {
        $this->ensurePasswordIsConfirmed();
        $confirm = new ConfirmTokenAuthentication( app('provider') );

        $confirm(Auth::user(), $this->code);

        $this->showingQrCode = false;
        $this->showingConfirmation = false;
        $this->showingRecoveryCodes = true;
    }

    /**
     * Display the user's recovery codes.
     *
     * @return void
     */
    public function showRecoveryCodes()
    {
        $this->ensurePasswordIsConfirmed();

        $this->showingRecoveryCodes = true;
    }

    /**
     * Generate new recovery codes for the user.
     *
     * @param  \Laravel\Fortify\Actions\GenerateNewRecoveryCodes  $generate
     * @return void
     */
    public function regenerateRecoveryCodes()
    {
        $this->ensurePasswordIsConfirmed();
        $generate = new GenerateNewRecoveryCodes();
        $generate(Auth::user());

        $this->showingRecoveryCodes = true;
    }

    /**
     * Disable token authentication for the user.
     *
     * @param  \Laravel\Fortify\Actions\DisableTokenAuthentication  $disable
     * @return void
     */
    public function disableTokenAuthentication()
    {
        $this->ensurePasswordIsConfirmed();

        $disable = new DisableTokenAuthentication( app('provider') );
        $disable(Auth::user());

        $this->showingQrCode = false;
        $this->showingConfirmation = false;
        $this->showingRecoveryCodes = false;
    }

    /**
     * Get the current user of the application.
     *
     * @return mixed
     */
    public function getUserProperty()
    {
        return Auth::user();
    }

    /**
     * Determine if token authentication is enabled.
     *
     * @return bool
     */
    public function getEnabledProperty()
    {
        return ! empty($this->user->token_secret);
    }
    public function render()
    {
        return view('livewire.token-configuration');
    }
}
