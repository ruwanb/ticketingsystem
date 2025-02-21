<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendTicketOpenNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $ticket;
    protected $question;

    /**
     * Create a new notification instance.
     */
    public function __construct($ticket, $question)
    {
        $this->ticket = $ticket;
        $this->question = $question;
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
        return (new MailMessage)
                    ->subject('You have submitted a Ticket')
                    ->line('You have submitted a Ticket')
                    ->line('Your ticket ID: ' . $this->ticket) 
                    ->line('Your question is: ') 
                    ->line($this->question) 
                    ->action('Check the Status', url('/tickets/'. $this->ticket))
                    ->line('Thank you for using our application!');
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
