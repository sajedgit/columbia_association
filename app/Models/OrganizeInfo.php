<?php 
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizeInfo extends Model
{
	
	   protected $fillable = [
      'organize_telephone','organize_email','organize_facebook','organize_instagram','organize_linkedin','organize_twitter','organize_info_created_edited_datetime'
    ];
}

	