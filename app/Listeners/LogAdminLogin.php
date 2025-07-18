<?php

namespace App\Listeners;

use App\Models\Admin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Request;
use App\Models\AdminActivityLogs;
use Jenssegers\Agent\Agent;
use Stevebauman\Location\Facades\Location;

class LogAdminLogin
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
        //
        $agent = new Agent();
        //this will use in production for actual public ip
        $location = Location::get(Request::ip());

        //use for local host so that it does not return null just for check
        // $location = Location::get('8.8.8.8');


        if ($event->user instanceof \App\Models\Admin) {
            AdminActivityLogs::create([
                'admin_id'   => $event->user->id,
                'ip_address' => Request::ip(),
                'user_agent' => Request::header('User-Agent'),
                'logged_in_at' => now(),
                'browser' => $agent->browser(),
                'browser_version' => $agent->version($agent->browser()),
                'platform' => $agent->platform(),
                'platform_version' => $agent->version($agent->platform()),
                'device' => $agent->device(),
                'is_mobile' => $agent->isMobile(),
                'is_desktop' => $agent->isDesktop(),
                'is_tablet' => $agent->isTablet(),
                'is_robot' => $agent->isRobot(),
                'country_name' => $location->countryName ?? 'Unknown',
                'region_name' => $location->regionName ?? 'Unknown',
                'city_name' => $location->cityName ?? 'Unknown',
                'pincode' => $location->zipCode ?? 'Unknown',
                'lattitude' => $location->latitude ?? 'Unknown',
                'longitude' => $location->longitude ?? 'Unknown',
                'timezone' => $location->timezone ?? 'Unknown',
            ]);
        }
    }
}
