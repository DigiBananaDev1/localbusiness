<?php

use Carbon\Carbon;

if (!function_exists('generate_otp')) {
    function generate_otp() {
        return random_int(100000, 999999);
    }
}

if (!function_exists('otp_expiry')) {
    function otp_expiry($time) {
        //takes time in minutes
        return Carbon::now()->addMinutes($time);
    }
}
