<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Bews;

class ArticleFeatured extends Notification  implements ShouldQueue
{
    use Queueable;
    protected $details;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
     public function toMail($notifiable)
    {
        return (new MailMessage)
                ->greeting($this->details['greeting'])
                ->subject($this->details['subject'])
                ->line($this->details['body'])   
                ->line($this->details['logo'])       
                ->action($this->details['actionText'], $this->details['actionURL'])
                ->line($this->details['thanks']);
    }

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
            'to_id'     => $this->details['to_id'],
            'from_id'   => $this->details['from_id'],
            'message'   => $this->details['message'],
        ];
    }
   
    public function toArray($notifiable)
    {
         return [
            'name' => $this->user->name,
            'email' => $this->user->email,
        ];
    }
}
