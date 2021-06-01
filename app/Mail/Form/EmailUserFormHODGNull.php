<?php

namespace App\Mail\Form;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailUserFormHODGNull extends Mailable
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
        // return $this->to($this->hod->email, $this->hod->name)

        return $this->to($this->hod->email , $this->hod->name)
                // ->from(env('MAIL_FROM_ADDRESS'))
                ->from('declare@mcmc.gov.my')
                ->subject('Lampiran G Baharu')
                ->view('mail.template.form_g.emailNull_userFormAdmin');
    }
}
