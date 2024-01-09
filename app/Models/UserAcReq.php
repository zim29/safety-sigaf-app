<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAcReq extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'terminal_id',
        'company_id',
        'vehicle_id',
        'comments',
        'areas',
        'status',
        'requester_auth',
        'head_auth',
        'coordinator_auth',
    ];

    /**
     * 
     *  Mutators and Accessors
     *  
     *  
     * */


    /**
     * 
     *  Relations
     *  
     *  
     * */

    public function creator () : BelongsTo
    {
        return $this->belongsTo( User::class, 'creator_id' );
    }

    public function updater () : BelongsTo
    {
        return $this->belongsTo( User::class, 'updater_id' );
    }

    public function company () : BelongsTo
    {
        return $this->belongsTo( Company::class );
    }

    public function vehicle () : BelongsTo
    {
        return $this->belongsTo( Vehicle::class );
    }

    public function terminal () : BelongsTo
    {
        return $this->belongsTo( Terminal::class );
    }

    public function requester () : BelongsTo
    {
        return $this->belongsTo( Authorization::class, 'requester_auth', 'id' );
    }

    public function headOfArea () : BelongsTo
    {
        return $this->belongsTo( Authorization::class, 'head_auth', 'id' );
    }

    public function Coordinator () : BelongsTo
    {
        return $this->belongsTo( Authorization::class, 'coordinator_auth', 'id' );
    }
}
