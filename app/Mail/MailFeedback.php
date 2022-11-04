<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class MailFeedback extends Mailable
{
    use Queueable, SerializesModels;

    protected $feedback;
    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $user)
    { 
        $this->feedback = $data[0];
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Feedback',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {   
             
        return new Content(
            markdown: 'emails.feedback',
            with: [
                'UserName' => $this->user->name,
                'UserEmail' => $this->user->email,
                'FeedBackName' => $this->feedback->name,
                'FeedBackBody' => $this->feedback->feedback,
                'FeedBackTime' => $this->feedback->created_at
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }

    public function build()
    {
        return $this->from('prisei@yandex.ru')->markdown('emails.feedback');
    }
}
