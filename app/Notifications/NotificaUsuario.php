<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Usuarios;
use App\Models\Agenda;

class NotificaUsuario extends Notification 
{
    use Queueable;
    
    private $usuario;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
   
    public function __construct( Usuarios $usuario,Agenda $agenda)
    {   
       
        $this->usuario = $usuario;
        $this->agenda = $agenda;
        
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
            'mensagem'=> 'você tem uma nova aula agendada, por favor acesse seu painel de aprovação !',
            'usuario'=>$this->usuario,
            'agenda'=>$this->agenda
        ];
    }
}
