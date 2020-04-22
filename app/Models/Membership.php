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
      'user_type_id', 'name','username','password','email','active','remember_token','created_at','updated_at'
    ];

	protected $hidden = ['password', 'remember_token'];

	public function attributes()
	{
		return [
			'password_confirmation' => 'Password Confirmation',
		];
	}

    public function membership_payments()
    {
        return $this->hasMany('App\Models\MembershipPayment','ref_membership_id');
    }

    public function member_devices()
    {
        return $this->hasMany('App\Models\MemberDevice','ref_member_device_membership_id');
    }

    public function member_job_infos()
    {
        return $this->hasMany('App\Models\MemberJobInfo','ref_member_job_info_membership_id');
    }

    public function member_personal_infos()
    {
        return $this->hasMany('App\Models\MemberPersonalInfo','ref_member_personal_info_membership_id');
    }
}

