<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use romanzipp\QueueMonitor\Traits\IsMonitored;
use App\Notifications\SendReminderNotification;

use Illuminate\Support\Facades\Mail;
use App\Mail\EmailSendReminderNotification;

class SendEmailNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    use IsMonitored;

    protected $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $user = $this->user;
      // $email = new EmailForQueuing();
      // Mail::to($this->details['email'])->send($email);
      // Mail::send(new EmailUserFormAdminC($this->admin, $this->email));
      // $user->notify(new SendReminderNotification());  // use this notification when email template not available
      return Mail::queue(new EmailSendReminderNotification($user));
    }
}
