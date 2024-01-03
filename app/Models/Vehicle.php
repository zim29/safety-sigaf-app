<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehicle extends Model
{
    
    
    use SoftDeletes, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'placard',
        't_placard',
        'color_id',
        'vehicle_brand_id',
        'vehicle_type_id',
        'company_id',
        'model',
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

    protected function placard () : Attribute 
    {
        return Attribute::make(
            set: fn ( string $value ) => strtoupper($value) ,
        );
    } 

    protected function tPlacard () : Attribute 
    {
        return Attribute::make(
            set: fn ( string | null $value ) => $value ? strtoupper($value) : null,
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
        return $this->belongsTo( Company::class, 'company_id' );
    }

    public function brand () : BelongsTo
    {
        return $this->belongsTo( VehicleBrand::class, 'vehicle_brand_id' );
    }

    public function type () : BelongsTo
    {
        return $this->belongsTo( VehicleType::class, 'vehicle_type_id' );
    }

    public function color () : BelongsTo
    {
        return $this->belongsTo( Color::class, 'color_id' );
    }

}
