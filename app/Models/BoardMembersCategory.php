<?php 
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoardMembersCategory extends Model
{
	
	   protected $fillable = [
      'board_members_category_name','board_members_category_position','board_members_category_active'
    ];
}

	