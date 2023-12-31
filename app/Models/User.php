<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Mail;

use App\Mail\NewUserInvitation;

use App\Traits\HasTokenApp;

use \Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasTokenApp;

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

    protected function fullname () : Attribute 
    {
        return Attribute::make(
            get: fn ( ) => "$this->name $this->surname",
        );
    } 

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

    public function profession () : BelongsTo
    {
        return $this->belongsTo(Profession::class);
    }

    public function city () : BelongsTo
    {
        return $this->belongsTo(City::class);
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
    public function hasRole (array $roles) : bool
    {

        $roleList = Role::whereIn('name', $roles)->pluck('id')->toArray();
        
        $contracts = UserAccess::getCurrentUserRoles($this->id)->pluck('role_id')->toArray();

        $hasRoles = (bool) array_intersect($roleList, $contracts);


        return $hasRoles;
    }


    /**
     * Get all companies a user can manage.
     *
     *
     *
     * @return Illuminate\Database\Eloquent\Builder 
     * 
     */
    public function getManegableCompanies () : Builder
    {
        $allowedRoles = [
            'Coordinator',
            'Administrative',
            'Head of area',
            'Manager',
        ];

        $roles = Role::select('id')->whereIn('name', $allowedRoles)->get()->toArray();

        $companiesID = UserAccess::where('user_id', $this->id)
                                            ->whereIn('role_id', $roles)
                                            ->pluck('company_id');
        $companies = Company::whereIn('id', $companiesID);

        return $companies;
    }

    /**
     * Get array with all companies ids a user can manage.
     *
     *
     *
     * @return array 
     * 
     */
    public function getManegableCompaniesArray () : array
    {

        return $this->getManegableCompanies()->pluck('id')->toArray();
    }


    public static function invite ( array $userData ) : void
    {
        $data = http_build_query($userData);
        Mail::to($userData['email'])->send(new NewUserInvitation($data));  


    }



}
