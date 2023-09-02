<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\User;

class AdminDatabase extends Notification 
{
    use Queueable;
    protected $admindetails;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($admindetails)
    {
        $this->details = $admindetails;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
   
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'url'    => $this->details['url'],
            'message'   => $this->details['message'],
            'to_id'     => $this->details['to_id'],
            'from_id'   => $this->details['from_id'],
        ];
    }
    
}
