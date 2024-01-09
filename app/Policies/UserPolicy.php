<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        $allowedRoles = [
            'Coordinator',
            'Administrative',
            'Head of area',
            'Manager',
        ];

        if( $user->hasRole($allowedRoles) ) return true;
        else return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $selectedUser): bool
    {
        $allowedRoles = [
            'Coordinator',
            'Administrative',
            'Head of area',
            'Manager',
        ];
        
        return $user->hasRole($allowedRoles);

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        $allowedRoles = [
            'Coordinator',
            'Administrative',
            'Head of area',
            'Manager',
        ];
        
        return $user->hasRole($allowedRoles);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $selectedUser): bool
    {
        return $user->id === $selectedUser->id;
    }

    /**
     * Determine whether the user can make access request to the models.
     */
    public function makeRequest(User $user, User $selectedUser): bool
    {
        return $vehicle->isManegableByAuth();
    }

    /**
     * Determine whether the user can see sidenav menu option.
     */
    public function showMenu ( User $user ) : bool
    {
        return $this->create($user) || $this->viewAny($user);
    }

}
