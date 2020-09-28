<?php
/*
NAME : Sajed Ahmed
EMAIL ADDRESS: sajedaiub@gmail.com
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoteCandidate extends Model
{
    public $timestamps=false;

    protected $table = 'vote_candidate';

    protected $fillable = [
        'vote_id','vote_position_id','user_id','status'
    ];



}


