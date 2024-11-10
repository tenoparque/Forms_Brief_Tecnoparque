<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevaSolicitudNotification extends Notification
{
    use Queueable;
    protected $solicitudId;
    protected $solicitudDetails;

    /**
     * Create a new notification instance.
     */
    public function __construct($solicitudId, $solicitudDetails)
    {
        $this->solicitudId = $solicitudId;
        $this->solicitudDetails = $solicitudDetails;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Nueva Solicitud Creada')
            ->line("Se ha creado una nueva solicitud con el ID: {$this->solicitudId}.")
            ->action('Ver Solicitud', url("/solicitudes/{$this->solicitudId}"))
            ->line('Gracias por usar nuestra aplicación.');
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

    

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'Se ha creado una nueva solicitud.',
            'url' => route('solicitudes.index')
        ];
    }
}
