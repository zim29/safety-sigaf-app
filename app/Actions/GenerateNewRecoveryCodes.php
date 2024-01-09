<?php

namespace App\Actions;

use Illuminate\Support\Collection;
use Laravel\Fortify\Events\RecoveryCodesGenerated;
use Laravel\Fortify\RecoveryCode;

use App\Models\User;

class GenerateNewRecoveryCodes
{
    /**
     * Generate new recovery codes for the user.
     *
     * @param  App\Models\User  $user
     * @return void
     */
    public function __invoke(User $user)
    {
        $user->forceFill([
            'token_recovery_codes' => encrypt(json_encode(Collection::times(8, function () {
                return RecoveryCode::generate();
            })->all())),
        ])->save();

        RecoveryCodesGenerated::dispatch($user);
    }
}
