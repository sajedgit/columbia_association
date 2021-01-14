<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMemberMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data,$subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$subject)
    {
        $this->data = $data;
        $this->subject = $subject;

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
            ->view('emails.send_member');
    }
}