<?php
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoardMember extends Model
{
      public $timestamps=false;

	   protected $fillable = [
      'ref_board_members_category_id','board_members_first_name','board_members_last_name','bio','board_members_image_location','board_member_designation','board_members_email_address','board_members_position','board_members_active'
    ];
	
	/**
     * Get the board_member_category for the board_member.
     */
    public function board_member_category()
    {
        return $this->belongsTo('App\Models\BoardMembersCategory','id');
    }


}

