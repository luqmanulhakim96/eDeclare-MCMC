<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use romanzipp\QueueMonitor\Traits\IsMonitored;

use App\Notifications\Gift\UserGiftAdminB;

class SendNotificationGiftB implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    use IsMonitored;

    protected $admin;
    protected $email;
    protected $giftbs;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($admin, $email, $giftbs)
    {
        $this->admin = $admin;
        $this->email = $email;
        $this->giftbs = $giftbs;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $gift = $this->giftbs;
      // $email = new EmailForQueuing();
      // Mail::to($this->details['email'])->send($email);
      // Mail::send(new EmailUserFormAdminC($this->admin, $this->email));
      $gift->notify(new UserGiftAdminB($this->admin, $this->email));
    }
}
