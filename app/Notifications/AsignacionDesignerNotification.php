<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AsignacionDesignerNotification extends Notification
{
    use Queueable;

    protected $solicitudId;
    protected $designerName;

    /**
     * Create a new notification instance.
     */
    public function __construct($solicitudId, $designerName)
    {
        $this->solicitudId = $solicitudId;
        $this->designerName = $designerName;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject('Solicitud Asignada')
        ->line("La solicitud #{$this->solicitudId} ha sido asignada al diseñador {$this->designerName}.")
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
            'message' => "La solicitud #{$this->solicitudId} te ha sido asignada.",
            'url' => url("/solicitudes/{$this->solicitudId}"),
        ];
    }
}
