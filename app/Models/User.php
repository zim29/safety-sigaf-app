<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'document_type_id',
        'document_number',
        'phone_number',
        'dob',
        'profession_id',
        'brigade_id',
        'gender_id',
        'blood_type_id',
        'allergies',
        'city_id',
        'c_terminal_id',
        'em_co_name',
        'em_co_phone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
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

    protected function surname () : Attribute 
    {
        return Attribute::make(
            set: fn ( string $value ) => ucwords( strtolower($value) ),
        );
    } 

    protected function email () : Attribute 
    {
        return Attribute::make(
            set: fn ( string $value ) => strtolower( $value ),
        );
    } 

    protected function emCoName () : Attribute 
    {
        return Attribute::make(
            set: fn ( string $value ) => ucwords( strtolower( $value ) ),
        );
    } 

    protected function dob () : Attribute 
    {
        return Attribute::make(
            get: fn ( string $value ) => Carbon::parse( $value )->format( 'd/m/Y' ),
        );
    } 


    /**
     * 
     *  Relations
     *  
     *  
     * */

    public function documentType () : BelongsTo
    {
        return $this->belongsTo(DocumentType::class);
    }



}
