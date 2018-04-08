<?php

namespace App\Jobs;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendSuccessfulRegistrationMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * User resource
     *
     * @var $user
     */
    private $user;

    /**
     * Create a new job instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @param Mailer $mailer
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        if (!is_null($this->user->email)) {
            $mailer->send('emails.auth.registration-success', ['data' => $this->user], function ($m) {
                $m->from('noreply@tiktok.com', 'Tiktok');
                $m->to($this->user->email);
                $m->subject('Tiktok | Registration Successful');
            });
        }
    }
}
