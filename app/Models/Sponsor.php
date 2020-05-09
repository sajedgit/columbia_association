<?php
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'sponsor_name', 'sponsor_details', 'sponsor_address', 'sponsor_email', 'sponsor_website', 'sponsor_logo_photo', 'sponsor_position', 'sponsor_created_datetime', 'sponsor_edited_date_time'
    ];
}

	