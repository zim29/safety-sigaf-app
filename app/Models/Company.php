<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'type',
        'description',
        'creator_id',
        'updater_id',
        'deleter_id',
    ];

    /**
     * 
     *  Mutators and Accessors
     *  
     *  
     * */

    protected function name () : Attribute 
    {
        return Attribute::make(
            set: fn ( string $value ) => ucwords( strtolower($value) ),
        );
    } 

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

    public function deleter () : BelongsTo
    {
        return $this->belongsTo( User::class, 'deleter_id' );
    }

    //Custom functions

    public function getManagers () : array
    {
        $managerRoles = [
            'Coordinator',
            'Administrative',
            'Head of area',
            'Manager',
        ];

        $rolesId = Role::select('id')
                            ->whereIn('name', $managerRoles)
                            ->get()
                            ->toArray();

        $users = UserAccess::select('user_id')
                        ->where('company_id', $this->id)
                        ->whereIn('role_id', $rolesId)
                        ->pluck('user_id')
                        ->toArray();

        return $users;
    }

}
