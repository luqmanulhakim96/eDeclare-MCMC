<?php

namespace App\Notifications\Form;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Mail\Form\EmailUserFormHODD;
use App\Mail\Form\EmailUserFormHODDNull;
use Illuminate\Support\Facades\Mail;
use romanzipp\QueueMonitor\Traits\IsMonitored;

class AdminFormHodD extends Notification
{
    use Queueable;
    use IsMonitored;

    protected $hod;
    protected $email;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($hod, $email)
    {
        //
        $this->hod = $hod;
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
          return Mail::queue(new EmailUserFormHODD($this->hod, $this->email));
        }
        else {
          return Mail::queue(new EmailUserFormHODDNull($this->hod));
        }
    }

    public function toDatabase($notifiable)
    {
        // dd($notifiable);
        return[
          'permohonan_id' => $notifiable->id,
          'tajuk' => 'Terdapat Lampiran Harta D baru yang perlu disemak',
          'tarikh_dicipta' => $notifiable->created_at,
          'kepada_email' => $this->hod->email,
          'kepada_id' => $this->hod->id,
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
