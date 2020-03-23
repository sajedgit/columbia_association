<?php 
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactU extends Model
{
	
	   protected $fillable = [
      'ref_membership_id','contact_us_subject','contact_us_details','contact_us_seen','contact_us_created_date_time'
    ];
}

	