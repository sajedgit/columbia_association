<?php 
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventTicketBuyer extends Model
{
	
	   protected $fillable = [
      'ref_event_id','ref_membership_id','buyer_first_name','buyer_last_name','payment_type','total_tickets','total_price','event_ticket_buyer_stored_datetime','event_ticket_buyer_edited_datetime'
    ];
}

	