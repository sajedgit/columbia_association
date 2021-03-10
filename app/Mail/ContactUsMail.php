<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name,$email,$subject,$msg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$email,$subject,$msg)
    {
        $this->name = trim($name);
        $this->email = trim($email);
        $this->subject = trim($subject);
        $this->msg = trim($msg);


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('emails.name');


        return $this->from( $this->email,$this->name)
            ->subject($this->subject."[From Columbia Contact Us Page]")
            ->view('emails.contact_us');
    }
}