<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;



class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($maildata)
    {
        $this->data = $maildata;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
 public function build()
 {
     $data = $this->data;

//  $user = $this->user;

          return $this->subject("Auto Park otp Verification ")->view('Email.email_otp',compact('data'));

            return $this->view('web.emailtemplate',compact('data'));


}
}
