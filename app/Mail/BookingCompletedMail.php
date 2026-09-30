<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingCompletedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $amountEarned;
    public $isSalaryPartner;

    /**
     * Create a new message instance.
     */
    public function __construct(Booking $booking, $amountEarned, $isSalaryPartner)
    {
        $this->booking = $booking;
        $this->amountEarned = $amountEarned;
        $this->isSalaryPartner = $isSalaryPartner;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Booking Completed! Earnings Added - Soulmate India',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.booking_completed',
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
