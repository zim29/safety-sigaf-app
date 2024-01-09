<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

use App\Mail\NotificationMail;
use App\Events\NotificationEvent;

class Notification extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'user_id',
        'notification_type',
        'request_id',
        'readed',
    ];

    protected static function booted ()
    {

        static::creating( function ( Notification $notification ){

            $userId = $notification->user_id;

            event(new NotificationEvent($userId));
            
            Mail::to(User::find($userId)->email)->send(new NotificationMail($notification));       

        } );
    }
}
