<?php 
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventTicketPayment extends Model
{
	
	   protected $fillable = [
      'ref_event_id','event_ticket_payment_by','event_ticket_payment_details','event_ticket_payment_datetime','event_ticket_payment_amount','event_ticket_payment_creating_datetime','event_ticket_payment_editing_datetime'
    ];
}

	