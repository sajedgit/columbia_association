<?php 
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoardMember extends Model
{
	
	   protected $fillable = [
      'ref_board_members_category_id','board_members_first_name','board_members_last_name','board_members_image_location','board_member_designation','board_members_email_address','board_members_position','board_members_active'
    ];
}

	