<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Request;
use App\Models\AdminActivityLogs;

class LogAdminLogout
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
    public function handle(Logout $event): void
    {
        //
        if ($event->user instanceof \App\Models\Admin) {
            // Optional: Update the most recent login record
            AdminActivityLogs::where('admin_id', $event->user->id)
                ->latest()
                ->first()?->update([
                    'logged_out_at' => now(),
                ]);
        }
    }
}
