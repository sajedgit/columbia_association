<?php
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoardMembersCategory extends Model
{
	  public $timestamps = false;

	   protected $fillable = [
      'board_members_category_name','board_members_category_position','board_members_category_active'
    ];
	
	/**
     * Get the board_member for the board_member_category.
     */
    public function board_member()
    {
        return $this->hasMany('App\Models\BoardMember','ref_board_members_category_id');
    }
	
	 public function details()
    {
        return $this->board_member();
    }

}


