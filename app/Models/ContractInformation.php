<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContractInformation extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'user_id',
        'position_id',
        'role_id',
        'company_id',
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

    public function company () : BelongsTo
    {
        return $this->belongsTo( Company::class );
    }

    public function user () : BelongsTo
    {
        return $this->belongsTo( User::class );
    }

    public function position () : BelongsTo
    {
        return $this->belongsTo( Position::class );
    }

    public function role () : BelongsTo
    {
        return $this->belongsTo( Role::class );
    }
}
