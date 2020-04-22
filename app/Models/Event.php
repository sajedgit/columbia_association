<?php
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	public $timestamps=false;
	   protected $fillable = [
      'event_title','event_details','event_venue','event_flyer_location','event_flyer_type','event_starting_date','event_starting_time','event_ending_date','event_ending_time','event_ticket_price','event_total_seat','event_active','event_created_datetime','event_edited_datetime'
    ];

		protected $hidden = ['password', 'remember_token', 'event_ending_date'];


    public function event_ticket_buyers()
    {
        return $this->hasMany('App\Models\EventTicketBuyer','ref_event_id');
    }

    public function event_ticket_payments()
    {
        return $this->hasMany('App\Models\EventTicketPayment','ref_event_id');
    }

    public function getEventFlyerLocationAttribute()
    {
        return  "images/".$this->attributes['event_flyer_location'];
    }

//    public function setEventFlyerLocationAttribute($value)
//    {
//        $this->attributes['event_flyer_location'] = $value;
//    }

}

