<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMembershipMail extends Mailable
{
    use Queueable, SerializesModels;
    public  $event_name, $subject, $user_name, $order_id, $source, $payment_type, $details, $start_date,$end_date,$renew_date,  $net_amounts,$msg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $event_name, $subject, $user_name, $order_id, $source, $payment_type, $details, $start_date,$end_date,$renew_date,  $net_amounts,$msg)
    {


        $this->event_name = $event_name;
        $this->subject = $subject;
        $this->user_name = $user_name;
        $this->order_id = $order_id;
        $this->source = $source;
        $this->payment_type = $payment_type;
        $this->details = $details;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->renew_date = $renew_date;
        $this->net_amounts = $net_amounts;
        $this->msg = $msg;


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('emails.name');
        return $this->from( "columbia_association@gmail.com","Columbia")
            ->subject($this->subject)
            ->view('emails.buy_membership');
    }
}