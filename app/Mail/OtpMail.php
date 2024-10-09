<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public $otp;
    public $firstName;
    public $lastName;

    public function __construct($otp, $firstName, $lastName)
    {
        $this->otp = $otp;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function build()
    {
        return $this->view('emails.otp')
                    ->with([
                        'otp' => $this->otp,
                        'fullName' => $this->firstName . ' ' . $this->lastName,
                    ]);
    }
}
