<?php

namespace App\Mail\Form;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailUserFormHODivGNull extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $hodiv;

    public function __construct($hodiv)
    {
        $this->hodiv = $hodiv;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->to($this->hod->email, $this->hod->name)

        return $this->to($this->hodiv->email , $this->hodiv->name)
                // ->from(env('MAIL_FROM_ADDRESS'))
                ->from('system@mcmc.com')
                ->subject('Lampiran G Baharu')
                ->view('mail.template.form_g.emailNull_userFormAdmin');
    }
}
