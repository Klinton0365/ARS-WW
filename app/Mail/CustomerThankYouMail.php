<?php

namespace App\Mail;

use App\Models\Lead;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CustomerThankYouMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Lead $lead)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thank You for Contacting ARS Wood Works',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.leads.customer-thankyou',
            with: [
                'lead' => $this->lead,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
