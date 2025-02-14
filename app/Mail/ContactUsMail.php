<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $send_email;
  
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($send_email)
    {
        $this->send_email = $send_email;
    }

    public function build() { 
        return $this->subject('Inquiry Detail')
                    ->view('api.emails.contact-us-email')->with(['send_email', $this->send_email]);
    }
}
