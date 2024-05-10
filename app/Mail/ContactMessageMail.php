<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public $flat_id;
    public $first_name;
    public $last_name;
    public $email_sender;
    public $text;
    /**
     * Create a new message instance.
     */
    public function __construct($flat_id, $first_name, $last_name, $email_sender, $text)
    {
        $this->flat_id = $flat_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email_sender = $email_sender;
        $this->text = $text;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: $this->email_sender,
            subject: 'Contact Message Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.contacts.message',
            with: ['content' => $this->text]
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
