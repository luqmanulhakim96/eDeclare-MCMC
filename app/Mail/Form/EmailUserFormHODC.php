<?php

namespace App\Mail\Form;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailUserFormHODC extends Mailable
{
  use Queueable, SerializesModels;

  /**
   * Create a new message instance.
   *
   * @return void
   */
   public $hod;
   public $email;

  public function __construct($hod, $email)
  {
      //
      $this->hod = $hod;
      $this->email = $email;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
      // return $this->to($this->admin->email, $this->admin->name)
      $email = $this->email;
      // dd($this->email);
      return $this->to($this->hod->email , $this->hod->name)
              // ->from(env('MAIL_FROM_ADDRESS'))
              ->from('declare@mcmc.gov.my')
              ->subject($this->email->subjek)
              ->view('mail.template.form_c.email_userFormAdmin', compact('email'));
  }
}
