<?php

namespace App\Actions;

use Illuminate\Support\Collection;
use App\Contracts\TokenAuthenticationProvider;
use App\Events\TokenAuthenticationEnabled;

class EnableTokenAuthentication
{
    /**
     * The two factor authentication provider.
     *
     * @var \Laravel\Fortify\Contracts\TokenAuthenticationProvider
     */
    protected $provider;

    /**
     * Create a new action instance.
     *
     * @param  \Laravel\Fortify\Contracts\TokenAuthenticationProvider  $provider
     * @return void
     */
    public function __construct( $provider )
    {
        $this->provider = $provider;
    }

    /**
     * Enable two factor authentication for the user.
     *
     * @param  mixed  $user
     * @return void
     */
    public function __invoke($user)
    {
        $user->forceFill([
            'token_secret' => encrypt($this->provider->generateSecretKey()),
            'token_recovery_codes' => encrypt(json_encode(Collection::times(8, function () {
                return RecoveryCode::generate();
            })->all())),
        ])->save();

        TokenAuthenticationEnabled::dispatch($user);
    }
}
