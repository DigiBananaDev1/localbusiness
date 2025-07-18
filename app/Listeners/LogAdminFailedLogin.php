<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Failed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Log;

class LogAdminFailedLogin
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
    public function handle(Failed $event): void
    {
        //
        if (Request::is('admin')) {
            Log::warning('Admin failed login attempt', [
                'email' => $event->credentials['email'] ?? 'N/A',
                'ip' => Request::ip(),
                'user_agent' => Request::userAgent(),
                'time' => now(),
            ]);
        }
    }
}
