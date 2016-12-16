<?php

namespace App\Listeners;

use App\Events\UserSignUp;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendMailerUserSignUp
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public $mail;
    public function __construct(Mail $mail)
    {
        $this->mall = $mail;
    }

    /**
     * Handle the event.
     *
     * @param  UserSignUp $event
     * @return void
     */
    public function handle(UserSignUp $event)
    {
        dd($event->user->email .' Welcome To Making');
    }
}
