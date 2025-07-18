<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendOtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public $otp;
    public $purpose;

    public function __construct($otp, $purpose = 'login')
    {
        $this->otp = $otp;
        $this->purpose = $purpose;
    }

    public function build()
    {
        $subject = $this->purpose === 'register' ? 'Your Registration OTP' : 'Your Login OTP';

        return $this->subject($subject)
                    ->markdown('emails.send_otp');
    }
}
