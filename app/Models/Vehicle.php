<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
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

    protected static function booted () 
    {
        Builder::macro('manegableVehiclesByAuth', function (){
            return $this->whereIn('company_id', \Auth::user()->getManegableCompaniesArray());
        });
    }


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


    //Custom functions

    /**
     * Check if the user has any of the specified roles in any company.
     *
     * This function takes an array of roles as a parameter and checks if the user
     * has any of these roles in any company.
     *
     * @param array $roles An array of roles to check for.
     *
     * @return bool Returns true if the user has any of the specified roles in any company,
     *              otherwise returns false.
     */
    public function isManegableByAuth ( ) : bool
    {

        $userCompanies = \Auth::user()
                                    ->getManegableCompanies()
                                    ->pluck('id')
                                    ->toArray();




        return in_array( $this->company_id, $userCompanies );
    }

    public function requestTransfer ( mixed $toCompanyId, string $comments = '' ) : bool
    {

        $vehicleTransfer = VehicleTransferRequest::create([
                                'vehicle_id' => $this->id,
                                'from_company_id' => $this->company_id,
                                'to_company_id' => $toCompanyId,
                                'comments' => $comments,
                            ]);

        return (bool) $vehicleTransfer;

    }


    public function unlink (  ) : bool 
    {
        $this->company_id = null;
        $this->save();

        return $this->wasChanged();
    }

    public function link ( int $companyId ) : bool 
    {
        $this->company_id = $companyId;
        $this->save();

        return $this->wasChanged();
    }

}
