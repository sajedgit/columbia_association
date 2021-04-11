<?php
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'admin_email', 'membership_price', 'url_ios', 'url_android', 'api_key_ios', 'api_key_android'
    ];
}

	