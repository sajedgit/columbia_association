<?php
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Memory extends Model
{
    public $timestamps=false;
    protected $fillable = [
      'memories_name','memories_details','memories_created_date_time','memories_editing_datetime','memories_active'
    ];
}


