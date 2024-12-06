<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WaitlistRequestDeniedNotification extends Notification
{
    use Queueable;

    protected $requestName;

    public function __construct($requestName)
    {
        $this->requestName = $requestName;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from(env('MAIL_FROM_ADDRESS'))
            ->subject('Waitlist Request Denied')
            ->greeting('Hello,')
            ->line('We are informing you that your waitlist request for "' . $this->requestName . '" has been denied.')
            ->line('If you have any questions, please contact the IT team.');
    }
}
