<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StockAlertNotification extends Notification
{
    use Queueable;

    public $mensaje;
    public $nivel;

    /**
     * Create a new notification instance.
     */
    public function __construct($mensaje, $nivel)
    {
        $this->mensaje = $mensaje;
        $this->nivel = $nivel; // critico, bajo, requieren mantenimiento
    }

    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->subject('⚠️ Alerta de Stock')
        ->greeting('Hola ' . $notifiable->name)
        ->line($this->mensaje)
        ->line('Nivel de alerta: ' . strtoupper($this->nivel))
        ->action('Actualizar inventario', url('/machine-products'))
        ->line('Este es un mensaje automático del sistema.');
    }

    public function toArray($notifiable)
    {
        return [
            'mensaje' => $this->mensaje,
            'nivel' => $this->nivel,
        ];
    }
}
