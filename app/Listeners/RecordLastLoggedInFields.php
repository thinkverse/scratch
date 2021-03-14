<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;

class RecordLastLoggedInFields
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        tap($event->user)->update([
            'last_loggedin_at' => now(),
            'last_loggedin_from' => request()->getClientIp(),
        ]);
    }
}
