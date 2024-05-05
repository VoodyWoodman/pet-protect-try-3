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
        // Получить пользователя, чей адрес электронной почты был подтвержден
        $user = $event->user;

        // Выполнить любую необходимую логику после подтверждения адреса электронной почты
        // Например, записать в журнал или выполнить другие действия
        logger()->info("User {$user->name} has verified their email address.");
    }
}
