<?php

namespace App\Notifications\Form;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Mail\Form\EmailUserFormHODivD;
use App\Mail\Form\EmailUserFormHODivDNull;
use Illuminate\Support\Facades\Mail;
use romanzipp\QueueMonitor\Traits\IsMonitored;

class AdminFormHodivD extends Notification
{
    use Queueable;
    use IsMonitored;

    protected $hodiv;
    protected $email;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($hodiv, $email)
    {
        //
        $this->hodiv = $hodiv;
        $this->email = $email;
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
        // dd($this->admin);
        if($this->email){
          return Mail::queue(new EmailUserFormHODivD($this->hodiv, $this->email));
        }
        else {
          return Mail::queue(new EmailUserFormHODivDNull($this->hodiv));
        }
    }

    public function toDatabase($notifiable)
    {
        // dd($notifiable);
        return[
          'permohonan_id' => $notifiable->id,
          'tajuk' => 'Terdapat Lampiran Harta D baru yang perlu disemak',
          'tarikh_dicipta' => $notifiable->created_at,
          'kepada_email' => $this->hodiv->email,
          'kepada_id' => $this->hodiv->id,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
