<?php

namespace App\Actions;

use Illuminate\Validation\ValidationException;
use App\Contracts\TokenAuthenticationProvider;
use App\Events\TokenAuthenticationConfirmed;

use App\Models\User;

class ConfirmTokenAuthentication
{
    /**
     * The two factor authentication provider.
     *
     * @var \App\Contracts\TokenAuthenticationProvider
     */
    protected $provider;

    /**
     * Create a new action instance.
     *
     * @param  \App\Contracts\TokenAuthenticationProvider  $provider
     * @return void
     */
    public function __construct(TokenAuthenticationProvider $provider)
    {
        $this->provider = $provider;
    }

    /**
     * Confirm the two factor authentication configuration for the user.
     *
     * @param  App\Models\User  $user
     * @param  string  $code
     * @return void
     */
    public function __invoke(User $user, string $code)
    {

        if (empty($user->token_secret) ||
            empty($code) ||
            ! $this->provider->verify($user->token_secret, $code)) {
            throw ValidationException::withMessages([
                'code' => [__('The provideds two factor authentication code was invalid.')],
            ])->errorBag('confirmTwoFactorAuthentication');
        }

        $user->forceFill([
            'token_confirmed_at' => now(),
        ])->save();

        TokenAuthenticationConfirmed::dispatch($user);
    }
}
