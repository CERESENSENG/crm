<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class admissionMailNotification extends Mailable
{
    use Queueable, SerializesModels;
     public $surname;
     public $firstname;
     public $course;
     public $appno;
    /**
     * Create a new message instance.
     */
    public function __construct($surname,$firstname,$course,$appno)

    {
         $this->surname=$surname;
         $this->firstname=$surname;
         $this->course=$course;
         $this->appno=$appno;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from:new Address(env('MAIL_FROM_ADDRESS')),
            subject: 'Admission Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'admission.mail.notification',
            with:['surname'=>$this->surname,
                  'firstname'=>$this->firstname,
                  'course'=>$this->course,
                  'appno'=>$this->appno,
    
        
        
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
