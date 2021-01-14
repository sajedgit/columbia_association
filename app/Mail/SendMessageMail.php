<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMessageMail extends Mailable
{
    use Queueable, SerializesModels;
    public $msg,$subject,$user_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($msg,$subject,$user_name)
    {
        $this->msg = $msg;
        $this->subject = $subject;
        $this->user_name = $user_name;


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('emails.name');
        return $this->from( "nypdbapa@gmail.com","BAPA")
            ->subject($this->subject)
            ->view('emails.message');
    }
}