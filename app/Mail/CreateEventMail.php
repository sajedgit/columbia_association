<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateEventMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data,$subject,$user_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$subject,$user_name)
    {
        $this->data = $data;
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
            ->view('emails.create_events');
    }
}