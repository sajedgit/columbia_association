<?php
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Memorie extends Model
{
    public $timestamps=false;

    protected $fillable = [
      'memories_name','memories_details','memories_thumb','memories_created_date_time','memories_editing_datetime','memories_active'
    ];

//    public function getMemoriesThumbAttribute()
//    {
//        //return  "public/images/memory/".$this->attributes['memories_thumb'];
//    }

    public function memory_photo()
    {
        return $this->hasMany('App\Models\MemoriesPhoto','ref_memories_id');
    }

}


