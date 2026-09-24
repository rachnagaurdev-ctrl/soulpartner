<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    public string $verificationUrl;
    public string $userName;

    public function __construct(User $user)
    {
        $this->verificationUrl = route('email.verify', [
            'token' => $user->email_verification_token,
            'email' => $user->email,
        ]);
        $this->userName = $user->name;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Verify Your Email – Soulmate India',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.email-verification',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
