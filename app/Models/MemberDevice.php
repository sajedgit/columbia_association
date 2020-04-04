<?php 
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberDevice extends Model
{
	public $timestamps=false;
	
	   protected $fillable = [
      'ref_member_device_membership_id','member_device_os_type','member_device_token_id','member_device_unique_id','member_device_storing_datetime'
    ];
}

	