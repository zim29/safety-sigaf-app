<?php

namespace App\Policies;

use App\Models\User;
use App\Models\VehicleAcReq;
use App\Models\Authorization;
use Illuminate\Auth\Access\Response;

class VehicleAcReqPolicy
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
            'Risk Professional',
        ];
        
        return $user->is($allowedRoles);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, VehicleAcReq $vehicleAcReq): bool
    {

        $allowedRoles = [
            'Coordinator',
            'Administrative',
            'Head of area',
            'Risk Professional',
        ];

        $allowed = false; 

        if( $user->is(['manager']) )
        {
            $allowed = $vehicleAcReq->requester->user === $user;
        }
        else 
        {
            $allowed = $user->is($allowedRoles) && $user->belongsToTerminal($vehicleAcReq->terminal_id);
        }

        
        return $user->is($allowedRoles);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        $allowedRoles = [
            'Coordinator',
            'Head of area',
            'Manager',
        ];
        
        $allowed = $user->is($allowedRoles);
        
        if($allowed) Authorization::make('Vehicle Access');

        return $allowed;
    }

    /**
     * Determine whether the user can approve or reject models.
     */
    public function riskValidation(User $user): bool
    {
        $allowedRoles = [
            'Risk professional',
        ];
        
        $allowed = $user->is($allowedRoles);
        
        if($allowed) Authorization::make('Vehicle Access');

        return $allowed;
    }

    /**
     * Determine whether the user can approve or reject models.
     */
    public function HeadValidation(User $user): bool
    {
        $allowedRoles = [
            'Coordinator',
            'Head of area',
        ];
        
        $allowed = $user->is($allowedRoles);
        
        if($allowed) Authorization::make('Vehicle Access');

        return $allowed;
    }

    /**
     * Determine whether the user can approve or reject models.
     */
    public function coordinatorValidation(User $user): bool
    {
        $allowedRoles = [
            'Coordinator',
        ];
        
        $allowed = $user->is($allowedRoles);
        
        if($allowed) Authorization::make('Vehicle Access');

        return $allowed;
    }

}
