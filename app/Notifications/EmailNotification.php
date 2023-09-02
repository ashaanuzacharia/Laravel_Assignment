<?php

namespace App\Notifications;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Geocoder;

class EmailNotification extends Notification implements ShouldQueue
{
    use Queueable;
    private $details;

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
        return ['mail','database'];
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
               // ->attach(public_path($this->details['filePath']), [
               //     'as' => $this->details['fileName'],
               //     'mime' => 'application/pdf',
               // ])
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
