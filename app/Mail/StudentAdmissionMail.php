<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentAdmissionMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $is_create_student;
  
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($is_create_student)
    {
        $this->is_create_student = $is_create_student;
    }

    public function build() { 
        return $this->subject('New Student Admission Detail')
                    ->view('api.emails.student-admission-form')->with(['send_email', $this->is_create_student]);
    }
}
