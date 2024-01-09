<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VehicleTransferRequest extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'vehicle_id',
        'from_company_id',
        'to_company_id',
        'status',
        'comments',
    ];

    /**
     * 
     *  Relations
     *  
     *  
     * */

    public function vehicle () : BelongsTo
    {
        return $this->belongsTo( Vehicle::class );
    }

    public function requester () : BelongsTo
    {
        return $this->belongsTo( Company::class, 'to_company_id' );
    }

    public function owner () : BelongsTo
    {
        return $this->belongsTo( Company::class, 'from_company_id' );
    }

    protected static function booted ()
    {


        static::creating( function ( VehicleTransferRequest $req ){

            $vehicleTransReq = VehicleTransferRequest::where('vehicle_id', $req->vehicle_id)
                                        ->where('from_company_id', $req->from_company_id)
                                        ->where('status', 'in_process');

            if( $vehicleTransReq )
            {
                $vehicleTransReq->update( [ 'status' => "rejected_by_system" ] );
            }
            
        } );

        static::created( function ( VehicleTransferRequest $req ){

            $company = Company::find($req->from_company_id);
            foreach($company->getManagers() as $manager)
            {
                Notification::create([
                    'user_id' => $manager,
                    'notification_type' => 'vehicle_trasnfer_request',
                    'request_id' => $req->id,
                ]);
            }
            
        } );

        static::updating( function ( VehicleTransferRequest $req ){

            $targetValues = ['approved_by_user', 'rejected_by_user'];


            if(in_array($req->status, $targetValues ))
            {
                $requests = VehicleTransferRequest::where('vehicle_id', $req->vehicle_id)
                                                        ->where('status', 'in_process');

                if( $requests )
                {
                    $requests->update( [ 'status' => "rejected_by_system" ] );
                }
            }
            
        } );
    }
}
