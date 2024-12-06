<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CheckoutRequestApprovedNotification extends Notification
{
    use Queueable;

    protected $requestType;
    protected $requestName;

    /**
     * Create a new notification instance.
     *
     * @param string $requestType
     * @param string $requestName
     */
    public function __construct($requestType, $requestName)
    {
        $this->requestType = $requestType;
        $this->requestName = $requestName;
    }

    /**
     * Get the notification delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from(env('MAIL_FROM_ADDRESS'))
            ->subject('Checkout Request Approved')
            ->greeting('Hello,')
            ->line('We are pleased to inform you that your checkout request for "' . $this->requestType . '" named "' . $this->requestName . '" has been approved.')
            ->line('If you have any questions or require further assistance, please contact the IT department.');
    }
}
