<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Verified;


class LogVerifiedUser
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Verified  $event
     * @return void
     */
    public function handle(Verified $event)
    {
        $user = $event->user;
        logger()->info("User {$user->getEmail()} has verified their email address.");
    }
}
