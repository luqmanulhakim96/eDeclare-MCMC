<?php

namespace App\Notifications\Form;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Mail\Form\EmailUserFormAdminD;
use App\Mail\Form\EmailUserFormAdminDNull;
use Illuminate\Support\Facades\Mail;
use romanzipp\QueueMonitor\Traits\IsMonitored;

class UserFormAdminD extends Notification
{
    use Queueable;
    use IsMonitored;

    protected $admin;
    protected $email;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($admin, $email)
    {
        //
        $this->admin = $admin;
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
          return Mail::queue(new EmailUserFormAdminD($this->admin, $this->email));
        }
        else {
          return Mail::queue(new EmailUserFormAdminDNull($this->admin));
        }
    }

    public function toDatabase($notifiable)
    {
        // dd($notifiable);
        return[
          'permohonan_id' => $notifiable->id,
          'tajuk' => 'Terdapat Lampiran D baru yang perlu disemak',
          'tarikh_dicipta' => $notifiable->created_at,
          'kepada_email' => $this->admin->email,
          'kepada_id' => $this->admin->id,
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
