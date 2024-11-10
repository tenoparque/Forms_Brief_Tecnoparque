<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Notification;

class CambioEstadoSolicitudNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $solicitud;
    protected $nuevoEstado;
    protected $designerName;

    public function __construct($solicitud, $nuevoEstado, $designerName)
    {
        $this->solicitud = $solicitud;
        $this->nuevoEstado = $nuevoEstado;
        $this->designerName = $designerName;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Cambio de Estado de Solicitud')
                    ->line("La solicitud #{$this->solicitud->id} ha cambiado de estado a '{$this->nuevoEstado}'.")
                    ->line("El cambio fue realizado por: {$this->designerName}.")
                    ->action('Ver Solicitud', url("/solicitudes/{$this->solicitud->id}"))
                    ->line('Gracias por usar nuestra aplicación.');
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => "La solicitud #{$this->solicitud->id} ha cambiado de estado a '{$this->nuevoEstado}'.",
            'url' => url("/solicitudes/{$this->solicitud->id}"),
            'designer' => $this->designerName,
        ];
    }
}
