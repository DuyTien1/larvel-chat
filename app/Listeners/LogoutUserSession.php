<?php

namespace App\Listeners;

use App\Events\UserSessionChange;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogoutUserSession
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
    public function handle(object $event): void
    {
        broadcast(new UserSessionChange("{$event->user->name} đã rời mạng", "error"));
    }
}
