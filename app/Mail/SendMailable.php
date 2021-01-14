<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $name,$fname,$lname,$email,$comment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fname,$lname,$email,$comment)
    {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
        $this->comment = $comment;


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('emails.name');

        return $this->from( $this->email,  $this->fname.' '.$this->lname)
            ->subject("Message From $this->email [Contact Us]")
            ->view('emails.name');
    }
}