<?php

namespace App\Listeners;

use App\Events\UserSessionChange;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LoginUserSession
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
     */
    public function handle(Login $event): void
    {
        broadcast(new UserSessionChange("{$event->user->name} đang trực tuyến", "success"));
    }
}
