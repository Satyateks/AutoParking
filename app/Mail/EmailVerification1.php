<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;



class EmailVerification1 extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($maildata11)
    {
        $this->data = $maildata11;
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

          return $this->subject("Auto Park Otp Verification ")->view('Email.email_user_otp',compact('data'));

            return $this->view('web.emailtemplate',compact('data'));


}
}
