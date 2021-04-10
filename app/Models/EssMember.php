<?php
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EssMember extends Model
{
    public $timestamps=false;

    protected $fillable = [
        'payment_type','name','email','created_at','active'
    ];




}

