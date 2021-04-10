<?php
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class Membership extends Authenticatable
{
    use HasApiTokens,Notifiable;

    protected $table = 'memberships';

    public $timestamps = false;
    protected $fillable = [
        'user_type_id',  'payment_type',  'ess_id', 'name','username','password','email','active','remember_token','created_at','updated_at','membership_status','membership_start_date','membership_end_date'
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

