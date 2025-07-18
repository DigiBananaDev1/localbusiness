<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminActivityLogs extends Model
{
    //
    protected $table = 'admin_activity_logs';
    protected $fillable = [
        'admin_id',
        'ip_address',
        'user_agent',
        'logged_in_at',
        'logged_out_at',
        'browser',
        'browser_version',
        'platform',
        'platform_version',
        'device',
        'is_mobile',
        'is_tablet',
        'is_desktop',
        'is_robot',
        'country_name',
        'region_name',
        'city_name',
        'pincode',
        'lattitude',
        'longitude',
        'timezone',
    ];
    
}
