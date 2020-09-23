<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use romanzipp\QueueMonitor\Traits\IsMonitored;

use App\Notifications\Form\AdminFormHodG;

class SendNotificationFormCHod implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    use IsMonitored;

    protected $hod;
    protected $email;
    protected $formcs;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($hod, $email, $formgs)
    {
        $this->hod = $hod;
        $this->email = $email;
        $this->formgs = $formgs;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $form = $this->formgs;
      // $email = new EmailForQueuing();
      // Mail::to($this->details['email'])->send($email);
      // Mail::send(new EmailUserFormAdminC($this->admin, $this->email));
      $form->notify(new AdminFormHodG($this->hod, $this->email));
    }
}
