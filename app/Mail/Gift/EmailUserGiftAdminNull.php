<?php

namespace App\Mail\Gift;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailUserGiftAdminNull extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $admin;

    public function __construct($admin)
    {
        $this->admin = $admin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->to($this->admin->email, $this->admin->name)

        return $this->to($this->admin->email , $this->admin->name)
                // ->from(env('MAIL_FROM_ADDRESS'))
                ->from('system@mcmc.com')
                ->subject('Lampiran Hadiah Baharu')
                ->view('mail.template.gift_b.emailNull_userFormAdmin');
    }
}
