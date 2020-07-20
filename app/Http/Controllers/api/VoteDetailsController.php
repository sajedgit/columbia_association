<?php

namespace App\Http\Controllers\api;

use App\Models\VoteDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\DB;


class VoteDetailsController extends Controller
{
    public function index()
    {

        $result_data = array();
        $results = VoteDetail::orderBy('id', 'desc')->get();

        foreach ($results as $data):

           $arr= array(
                "vote_id"=>$data->id,
                "description"=>$data->description,
                "voting_date"=>$data->voting_date,
                "start_time"=>$data->start_time,
                "end_time"=>$data->end_time,
                "position"=>$this->get_position($data->id)

            );
        array_push($result_data,$arr);
        endforeach;


        return response()->json([
            'success' => true,
            'data' => $result_data
        ]);


    }


    function get_position($vot_id)
    {
        //$results = VotePosition::orderBy('sort_order', 'asc')->get();
        $results =DB::table('vote_position')
            ->where('vote_id', $vot_id)
            ->orderBy('sort_order')
            ->get();
        $array_data=array();
        foreach ($results as $data):

            $arr= array(
                "position_id"=>$data->id,
                "position_name"=>$data->position_name,
                "no_of_candidate"=>$data->noc,
                "candidate"=>$this->get_candidate($vot_id,$data->id)

            );
            array_push($array_data,$arr);
        endforeach;
        return $array_data;
    }



    function get_candidate($vot_id,$position_id)
    {
        //$results = VotePosition::orderBy('sort_order', 'asc')->get();
        $results =DB::table('vote_candidate')
            ->where('vote_id', $vot_id)
            ->where('vote_position_id',$position_id)
            ->orderBy('id')
            ->get();
        $array_data=array();
        foreach ($results as $data):

            $arr= array(
                "id"=>$data->id,
                "candidate_id"=>$data->user_id,
                "candidate_name"=>$this->get_user_name_by_id($data->user_id)

            );
            array_push($array_data,$arr);
        endforeach;
        return $array_data;
    }

    function get_user_name_by_id($id)
    {
        $user = DB::table('memberships')->where('id', $id)->first();

        return $user->name;
    }



    function insert_vote()
    {
        $vote_id=$_REQUEST['vote_id'];
        $vote_position_id=$_REQUEST['vote_position_id'];
        $vote_candidate_id=$_REQUEST['vote_candidate_id'];
        $voter_id=$_REQUEST['voter_id'];

        $values = array(
            'vote_id' => $vote_id,
            'vote_position_id' => $vote_position_id,
            'vote_candidate_id' => $vote_candidate_id,
            'voter_id' => $voter_id
        );

        $insert_vote_id=DB::table('vote_count')->insertGetId($values);
        if($insert_vote_id)
        {
            return response()->json([
                'success' => true,
                'data' => "Your vote completed successfully"
            ]);
        }
        else
        {
            return response()->json([
                'success' => false,
                'data' => "not completed"
            ]);
        }
    }







}










