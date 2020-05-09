<?php
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemoriesPhoto extends Model
{

    public $timestamps=false;
	   protected $fillable = [
      'ref_memories_id','memories_photo_location','memories_photo_uploaded_date_time','memories_photo_active'
    ];

//    public function getMemoriesPhotoLocationAttribute()
//    {
//        return  "images/memory/".$this->attributes['memories_photo_location'];
//    }
}

