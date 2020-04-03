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
      'name','username','passcode','email','active','remember_token','created_at','updated_at'
    ];
	
	
	
	public function attributes()
	{
		return [
			'passcode_confirmation' => 'Password Confirmation',
		];
	}
}

 