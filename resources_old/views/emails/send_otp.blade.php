@component('mail::message')
# {{ $purpose === 'register' ? 'Welcome!' : 'Login OTP' }}

Your OTP is:

# {{ $otp }}

This OTP is valid for 5 minutes. Please do not share it.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
