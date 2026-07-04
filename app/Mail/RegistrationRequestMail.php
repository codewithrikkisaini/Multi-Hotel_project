<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\RegistrationRequest;

class RegistrationRequestMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $registrationRequest;

    public function __construct(RegistrationRequest $registrationRequest)
    {
        $this->registrationRequest = $registrationRequest;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Hotel Registration Request - ' . $this->registrationRequest->hotel_name,
        );
    }

    public function content(): Content
    {
        // Fallback to text if markdown view doesn't exist yet
        return new Content(
            markdown: 'emails.registration.request',
            with: [
                'registration' => $this->registrationRequest,
            ],
        );
    }
}
