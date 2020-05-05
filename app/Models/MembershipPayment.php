<?php 
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MembershipPayment extends Model
{
	  protected $table = 'membership_payments';
    public $timestamps = false;

	  protected $fillable = [
      'ref_membership_id','membership_payment_ess','membership_payment_by','membership_payment_details','membership_payment_datetime','membership_payment_amount','membership_next_renewal_date','membership_payment_creating_datetime','membership_payment_editing_datetime'
    ];
}

	