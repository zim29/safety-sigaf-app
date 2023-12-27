<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VehicleAcReq extends Model
{

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'company_id',
        'terminal_id',
        'comments',
        'requires_risk_validation',
        'requester_auth',
        'risk_validation_auth',
        'head_auth',
        'coordinator_auth',
        'status',
        'creator_id',
        'updater_id',
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

    public function terminal () : BelongsTo
    {
        return $this->belongsTo( Terminal::class );
    }

    public function requester () : BelongsTo
    {
        return $this->belongsTo( Authorization::class, 'requester_auth', 'id' );
    }

    public function risk_professional () : BelongsTo
    {
        return $this->belongsTo( Authorization::class, 'risk_validation_auth', 'id' );
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
