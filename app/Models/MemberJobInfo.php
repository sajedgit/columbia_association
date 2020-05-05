<?php 
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberJobInfo extends Model
{
	  protected $table = 'member_job_infos';
    public $timestamps = false;

	  protected $fillable = [
      'ref_member_job_info_membership_id','member_command_code','member_command_name','member_rank','member_shield','member_appointment_date','member_promoted_date','member_boro','member_benificiary','member_reference_no','member_retired','member_job_info_creating_datetime','member_job_info_editing_datetime'
    ];
}

	