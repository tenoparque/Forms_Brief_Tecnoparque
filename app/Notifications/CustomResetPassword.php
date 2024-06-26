<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Lang;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomResetPassword extends Notification
{
    use Queueable;

    public $token;
    public $user;

    /**
     * Create a new notification instance.
     */
    public function __construct($token,$user)

       
    {
        $this->token= $token;
        $this->user= $user;
        //
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
         ->view('mails.reset-Pass-correo',['token' =>$this->token,'user' => $this->user]);

                   
    // ->subject(Lang::get('Cambio de contraseña'))
    // ->greeting('¡Hola!')
    // ->line(Lang::get('Está siendo notificado mediante este correo electrónico debido a que hemos registrado una petición de restablecimiento de contraseña para su cuenta.'))
    // ->action('Restablecer contraseña', url(config('app.url').route('password.reset', ['token' => $this->token, 'email' => $this->user->email, false])))
    // ->line(Lang::get('This password reset link will expire in :count minutes.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
    // ->line(Lang::get('If you did not request a password reset, no further action is required.'));
                    
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
