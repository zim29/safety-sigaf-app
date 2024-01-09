<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Builder;

class UserAccess extends Pivot
{
    
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'user_id',
        'role_id',
        'company_id',
        'from',
        'until',
        'status',
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

    public function role () : BelongsTo
    {
        return $this->belongsTo( Role::class );
    }

    //Custom functions

    public static function getCurrentUserRoles ( int $user ) : Builder
    {
        return UserAccess::where('user_id', $user)
                            ->where('status', true)
                            ->where('from', '<', now())
                            ->where('until', '>', now());
    }
}
