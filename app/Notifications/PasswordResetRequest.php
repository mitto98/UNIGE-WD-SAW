<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordResetRequest extends Notification
{
    use Queueable;

    protected $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $url = url('/reset/' . $this->token);
        return (new MailMessage)
            ->greeting("Ciao!")
            ->line('Pronto a inserire la tua nuova passowrd? Premi sul bottone qui sotto')
            ->action('Reimposta password', url($url))
            ->line('Se non sei statu tu poco male, puoi tranquillamente eliminare questo messaggio.');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
