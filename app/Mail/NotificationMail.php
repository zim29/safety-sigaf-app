<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Database\Eloquent\Model;

use App\Models\Notification;

class NotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public Notification $notification,
    )
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('Notificación de Safety Sigaf'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $requestId = $this->notification->request_id;
        
        if($this->notification->notification_type === 'vehicle_trasnfer_request')
            return new Content(
                markdown: 'mail.vehicle-transfer-request',
                with: [
                    'request' => \App\Models\VehicleTransferRequest::findOrFail($requestId),
                ]
            );
        
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
