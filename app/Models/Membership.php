<?php
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{

    public $timestamps = false;
	   protected $fillable = [
      'membership_username','membership_password_value','membership_status','membership_expired_date','membership_creating_datetime','membership_editing_datetime'
    ];
}

