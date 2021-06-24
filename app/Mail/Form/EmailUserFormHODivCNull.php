<?php

namespace App\Mail\Form;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailUserFormHODivCNull extends Mailable
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
        // return $this->to($this->admin->email, $this->admin->name)

        return $this->to($this->hodiv->email , $this->hodiv->name)
                // ->from(env('MAIL_FROM_ADDRESS'))
                ->from('declare@mcmc.gov.my')
                ->subject('Lampiran C Baharu')
                ->view('mail.template.form_c.emailNull_userFormAdmin');
    }
}
