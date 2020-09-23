<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use romanzipp\QueueMonitor\Traits\IsMonitored;

use App\Notifications\Form\AdminFormHodC;

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
    public function __construct($hod, $email, $formcs)
    {
        $this->hod = $hod;
        $this->email = $email;
        $this->formcs = $formcs;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $form = $this->formcs;
      // $email = new EmailForQueuing();
      // Mail::to($this->details['email'])->send($email);
      // Mail::send(new EmailUserFormAdminC($this->admin, $this->email));
      $form->notify(new AdminFormHodC($this->hod, $this->email));
    }
}
