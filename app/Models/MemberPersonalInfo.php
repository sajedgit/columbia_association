<?php 
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberPersonalInfo extends Model
{
	  protected $table = 'member_personal_infos';
    public $timestamps = false;

	  protected $fillable = [
      'ref_member_personal_info_membership_id','member_first_name','member_last_name','member_birth_date','member_gender','member_address','member_zip_code','member_email_address','member_tax_reg_no','member_personal_info_creating_datetime','member_personal_info_editing_datetime'
    ];
}

	