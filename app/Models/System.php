<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class System extends Model
{
    
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'company_id',
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

    public function company () : BelongsTo
    {
        return $this->belongsTo( Company::class );
    }

}
