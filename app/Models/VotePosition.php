<?php
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VotePosition extends Model
{
    public $timestamps=false;

    protected $table = 'vote_position';

    protected $fillable = [
        'vote_id','position_name','noc','sort_order','status','member'
    ];



}


