<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Auth\Access\Response;

class VehiclePolicy
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

        if( $user->is($allowedRoles) ) return true;
        else return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Vehicle $vehicle): bool
    {
        $allowedRoles = [
            'Coordinator',
            'Administrative',
            'Head of area',
            'Manager',
        ];
        
        return $user->is($allowedRoles);

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
        
        return $user->is($allowedRoles);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Vehicle $vehicle): bool
    {
        return $vehicle->belongsToCompany( $user->manegableCompanies() );
    }

    /**
     * Determine whether the user can make access request to the models.
     */
    public function makeRequest(User $user, Vehicle $vehicle): bool
    {
        return $vehicle->belongsToCompany( $user->manegableCompanies() );
    }

    /**
     * Determine whether the user can see sidenav menu option.
     */
    public function showMenu ( User $user ) : bool
    {
        return $this->create($user) || $this->viewAny($user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Vehicle $vehicle): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Vehicle $vehicle): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Vehicle $vehicle): bool
    {
        return false;
    }
}
