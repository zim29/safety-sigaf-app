<?php

namespace App\Actions;

use App\Events\TokenAuthenticationDisabled;

use App\Models\User;

class DisableTokenAuthentication
{
    /**
     * Disable token authentication for the user.
     *
     * @param  App\Models\User  $user
     * @return void
     */
    public function __invoke(User $user)
    {
        if (! is_null($user->token_secret) ||
            ! is_null($user->token_recovery_codes) ||
            ! is_null($user->token_confirmed_at)) {
            $user->forceFill([
                'token_secret' => null,
                'token_recovery_codes' => null,
                'token_confirmed_at' => null,
            ] )->save();

            TokenAuthenticationDisabled::dispatch($user);
        }
    }
}
