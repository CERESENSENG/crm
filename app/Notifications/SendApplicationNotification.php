<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendApplicationNotification extends Notification
{
    use Queueable;

    private $firstname;
    private $app_no;
    private $session;
    private $cohort;
    /**
     * Create a new notification instance.
     */
    public function __construct($firstname, $appNo,$session, $cohort)
    {
        //
        $this->firstname =  $firstname;
        $this->app_no = $appNo;
        $this->session = $session;
        $this->cohort = $cohort;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $subject =  'Application Received - Secure Your Slot for the 3-in-1 IT Skills Programme!';
        //'Ceresense '.$this->session. '- Cohort '.$this->cohort.' Application Registration';

        return (new MailMessage)
                    // ->line('The introduction to the notification.')
                    // ->action('Notification Action', url('/'))
                    // ->line('Thank you for using our application!');


                    ->subject($subject)
                    ->greeting('Dear ' . $this->firstname . ',')
                    //->line($this->session. '- Cohort '.$this->cohort.' Application Registration has been received.')
                    ->line('Thank you for your interest in the 3-in-1 IT Skills Programme at Ceresense!
                    We are pleased to inform you that we have received your application.
                     Your application number is '.$this->app_no.'.' )
                     ->line('To secure your spot and take advantage of the exclusive cohort discount, we encourage you to complete the payment immediately, as this is a limited-time offer.
                    The cohort discount is only available for a short period, and slots are filling up fast.')
                      ->line('To proceed with your payment, simply click the button below:')
                    ->action('Click here to Proceed to Payment', route('promo.cart',$this->app_no))

                    ->line('We highly recommend finalizing your payment soon to secure your discounted rate and ensure your participation in the programme.')
                    ->line('If you have any questions or need further assistance, please do not hesitate to contact our customer support team at +234-7063-419-718, +234-8036-436-594.')

                    ->line('We look forward to welcoming you to the 3-in-1 IT Skills Programme at Ceresense!');

    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
