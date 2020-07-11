<?php
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoteDetail extends Model
{
    public $timestamps=false;

    protected $fillable = [
        'vote_name','description','voting_date','start_time','end_time','status'
    ];



}


