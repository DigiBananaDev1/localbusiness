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

function maskMobileNumber($number, $startVisible = 4, $endVisible = 2, $maskChar = 'x') {
    $length = strlen($number);

    // If number is too short to mask
    if ($length <= ($startVisible + $endVisible)) {
        return $number;
    }

    $start = substr($number, 0, $startVisible);
    $end = substr($number, -$endVisible);
    $maskedLength = $length - ($startVisible + $endVisible);

    return $start . str_repeat($maskChar, $maskedLength) . $end;
}

