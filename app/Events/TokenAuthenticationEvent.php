<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;

use App\Models\User;

abstract class TokenAuthenticationEvent
{
    use Dispatchable;

    /**
     * The user instance.
     *
     * @var \App\Models\User
     */
    public User $user;

    /**
     * Create a new event instance.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function __construct( User $user )
    {
        $this->user = $user;
    }
}
