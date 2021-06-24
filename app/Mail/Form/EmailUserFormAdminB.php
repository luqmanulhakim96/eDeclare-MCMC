<?php

namespace App\Mail\Form;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailUserFormAdminB extends Mailable
{
  use Queueable, SerializesModels;

  /**
   * Create a new message instance.
   *
   * @return void
   */
   public $admin;
   public $email;

  public function __construct($admin, $email)
  {
      //
      $this->admin = $admin;
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
      return $this->to($this->admin->email , $this->admin->name)
              // ->from(env('MAIL_FROM_ADDRESS'))
              ->from('declare@mcmc.gov.my')
              ->subject($this->email->subjek)
              ->view('mail.template.form_b.email_userFormAdmin', compact('email'));
  }
}
