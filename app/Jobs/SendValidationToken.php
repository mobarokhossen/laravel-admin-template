<?php

namespace App\Jobs;

use App\Acme\SmsSystem\Sms;
use App\UserVerifyCodes;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendValidationToken implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * UserVerifyCodes resource
     *
     * @var UserVerifyCodes
     */
    private $userVerifyCode;

    /**
     * Create a new job instance.
     *
     * @param UserVerifyCodes $userVerifyCode
     */
    public function __construct(UserVerifyCodes $userVerifyCode)
    {
        $this->userVerifyCode = $userVerifyCode;
    }

    /**
     * Execute the job.
     *
     * @param Mailer $mailer
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        if ($this->userVerifyCode->type == 'email') {
            $mailer->send('emails.auth.token', ['data' => $this->userVerifyCode], function ($m) {
                $m->from('noreply@tiktok.com', 'Tiktok');
                $m->to($this->userVerifyCode->username);
                $m->subject('Tiktok | Verify Token');
            });
        } elseif ($this->userVerifyCode->type == 'phone') {
            $sms = new Sms();

            $sms->send($this->userVerifyCode->username, "Tiktok Verification Code: ". $this->userVerifyCode->verify_token ." by Tiktok");
        }
    }
}
