<?php

namespace App\Mail\Form;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailUserFormHODDNull extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $hod;

    public function __construct($hod)
    {
        $this->hod = $hod;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->to($this->admin->email, $this->admin->name)

        return $this->to($this->hod->email , $this->hod->name)
                // ->from(env('MAIL_FROM_ADDRESS'))
                ->from('system@mcmc.com')
                ->subject('Lampiran D Baharu')
                ->view('mail.template.form_d.emailNull_userFormAdmin');
    }
}
