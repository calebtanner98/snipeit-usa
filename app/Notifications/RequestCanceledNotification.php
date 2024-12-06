<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RequestCanceledNotification extends Notification
{
    use Queueable;

    protected $requestType;
    protected $requestName;

    /**
     * Create a new notification instance.
     *
     * @param string $requestType
     */
    public function __construct($requestType, $requestName, $cancelReason = null)
    {
        $this->requestType = $requestType;
        $this->requestName = $requestName;
        $this->cancelReason = $cancelReason;
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
        $mailMessage = (new MailMessage)
            ->from(env('MAIL_FROM_ADDRESS'))
            ->subject('Request Canceled')
            ->greeting('Hello,')
            ->line('This is to notify you that your request for "' . $this->requestType . '" named "' . $this->requestName . '" has been canceled.');
    
        // Add the cancel reason if it exists
        if (!empty($this->cancelReason)) {
            $mailMessage->line('Reason for cancellation: "' . $this->cancelReason . '"');
        }
        
        $mailMessage->line('If you have any questions or require further assistance, please contact the IT department.');
    
        return $mailMessage;
    }
    
}
