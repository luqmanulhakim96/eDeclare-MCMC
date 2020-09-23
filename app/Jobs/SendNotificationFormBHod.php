<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use romanzipp\QueueMonitor\Traits\IsMonitored;

use App\Notifications\Form\AdminFormHodB;

class SendNotificationFormBHod implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    use IsMonitored;

    protected $hod;
    protected $email;
    protected $formbs;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($hod, $email, $formbs)
    {
        $this->hod = $hod;
        $this->email = $email;
        $this->formbs = $formbs;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $form = $this->formbs;
      // $email = new EmailForQueuing();
      // Mail::to($this->details['email'])->send($email);
      // Mail::send(new EmailUserFormAdminC($this->admin, $this->email));
      $form->notify(new AdminFormHodB($this->hod, $this->email));
    }
}
