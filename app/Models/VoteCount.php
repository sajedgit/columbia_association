<?php
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;  

class VoteCount extends Model
{
    public $timestamps=false;
    public $table = 'vote_count';

    protected $fillable = [
        'vote_id','vote_position_id','vote_candidate_id','voter_id'
    ];

}


