<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEventDonate extends Mailable
{
    use Queueable, SerializesModels;
    public $subject, $user_name,$user_email,$order_id, $source, $payment_type,$details,$net_amounts;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $user_name,$user_email,$order_id, $source, $payment_type,$details,$net_amounts)
    {
        $this->user_email = $user_email;
        $this->subject = $subject;
        $this->user_name = $user_name;
        $this->order_id = $order_id;
        $this->source = $source;
        $this->payment_type = $payment_type;
        $this->details = $details;
        $this->net_amounts = $net_amounts; 


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
            ->view('emails.donate');
    }
}