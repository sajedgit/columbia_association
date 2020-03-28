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
      'name','username','password','email','active','remember_token','created_at','updated_at'
    ];
	
	
	
	public function attributes()
	{
		return [
			'password_confirmation' => 'Password Confirmation',
		];
	}
}

 