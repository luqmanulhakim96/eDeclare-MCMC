<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailSendReminderNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->to($this->admin->email, $this->admin->name)
        // dd($this->user);
        return $this->to($this->user->email , $this->user->name)
                // ->from(env('MAIL_FROM_ADDRESS'))
                ->from('declare@mcmc.gov.my')
                ->subject('Peringatan! e-Declare ('.date('d-M-Y').')')
                ->view('mail.template.reminder.reminder');
    }
}
