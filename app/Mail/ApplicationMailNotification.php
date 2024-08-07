<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApplicationMailNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $surname;
    public $firstname;
    public $course;
    public $appno;
    public $date;
    // public $students;

   
    public function __construct($surname,$firstname,$course,$appno,$date,)
    {
        $this->surname= $surname;
        $this->firstname= $firstname;
        $this->course=$course;
        $this->appno=$appno;
        $this->date=$date;
        // $this->students=$students;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from:new Address(env('MAIL_FROM_ADDRESS')),
            subject: 'Application :: Ceresense',
        );
    }

    /**
     * Get the message content definition.
     * 
     */
    public function content(): Content
    {
          // change d name of dis test_email: use  applicationNotififcation
        return new Content(
            view: 'application.mail.applicationNotification',
            with:['surname'=>$this->surname,
                  'firstname'=>$this->firstname,
                  'course'=>$this->course,
                  'appno'=>$this->appno,
                  'date'=>$this->date,
                //   'student'=>$this->students,
        
        
        ],
        
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
