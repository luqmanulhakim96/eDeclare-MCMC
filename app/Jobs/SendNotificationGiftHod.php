<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use romanzipp\QueueMonitor\Traits\IsMonitored;

use App\Notifications\Gift\UserGiftHod;

class SendNotificationGiftHod implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    use IsMonitored;

    protected $admin;
    protected $email;
    protected $gifts;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($admin, $email, $gifts)
    {
        $this->admin = $admin;
        $this->email = $email;
        $this->gifts = $gifts;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $gift = $this->gifts;
      // $email = new EmailForQueuing();
      // Mail::to($this->details['email'])->send($email);
      // Mail::send(new EmailUserFormAdminC($this->admin, $this->email));
      $gift->notify(new UserGiftHod($this->admin, $this->email));
    }
}
