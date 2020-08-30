<?php

namespace App\Http\Controllers\api;

use App\Models\VoteDetail;
use App\Models\VoteCount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\DB;

class VoteDetailsController extends Controller
{
    //(NEW FUNC ADDED (raju))----------GET UTC TIME AFTER ADDING HOURS (DIFFERCE BETWEEN UTC AND LOCAL TIME)--------------
    public function get_filter_date_time($date_time)
    {
        $date_time_utc = $date_time[0]->date_time;
        $date_time_utc = new \DateTime($date_time_utc);
        $date_time_utc->modify('+6 hours');

        return $date_time_utc;
    }

    public function index()
    {

        $result_data = array();
        $results = VoteDetail::orderBy('id', 'desc')->get();

        //IF THERE IS NO VOTE YET
        if (sizeof($results) < 1) {
            return 'Vote system off now';
        }

        //GET UTC TIME
        $date_time = DB::select("SELECT UTC_TIMESTAMP() as date_time FROM DUAL");

        //ADD VOTE DATE WITH VOTE TIME
        $vote_start_date_time = $results[0]->voting_date . " " . $results[0]->start_time;
        $vote_end_date_time = $results[0]->voting_date . " " . $results[0]->end_time;

        $utc_time = $this->get_filter_date_time($date_time);

        //COMPARING UTC TIME WITH VOTE TIME
        if ($utc_time->format('Y-m-d H:i:s') < $vote_start_date_time) {
            return "Vote will start soon";
        } elseif ($utc_time->format('Y-m-d H:i:s') > $vote_end_date_time) {
            return "Vote time is over";
        } else {
            foreach ($results as $data) :

                $arr = array(
                    "vote_id" => $data->id,
                    "description" => $data->description,
                    "voting_date" => $data->voting_date,
                    "start_time" => $data->start_time,
                    "end_time" => $data->end_time,
                    "position" => $this->get_position($data->id)

                );
                array_push($result_data, $arr);
            endforeach;

            return $result_data;
        }
    }

    //(NEW FUNCTION ADDED (raju))---------------CHECK USE VOTE GIVEN OR NOT-----------------------
    public function check_user_vote($user_id)
    {
        $results = VoteCount::where('voter_id', $user_id)->first();

        if ($results) {
            return response()->json([
                'success' => false,
                'data' => "Your have already given your vote"
            ]);
        } else {
            $result_data = $this->index();

            return response()->json([
                'success' => true,
                'data' => $result_data
            ]);
        }
    }

    //-----------------------------PERVIOUS INDEX----------------------------

    // public function index()
    // {

    //     $result_data = array();
    //     $results = VoteDetail::orderBy('id', 'desc')->get();

    //     foreach ($results as $data):

    //         $arr = array(
    //             "vote_id" => $data->id,
    //             "description" => $data->description,
    //             "voting_date" => $data->voting_date,
    //             "start_time" => $data->start_time,
    //             "end_time" => $data->end_time,
    //             "position" => $this->get_position($data->id)

    //         );
    //         array_push($result_data, $arr);
    //     endforeach;


    //     return response()->json([
    //         'success' => true,
    //         'data' => $result_data
    //     ]);


    // }

    function get_position($vot_id)
    {
        //$results = VotePosition::orderBy('sort_order', 'asc')->get();
        $results = DB::table('vote_position')
            ->where('vote_id', $vot_id)
            ->orderBy('sort_order')
            ->get();
        $array_data = array();
        foreach ($results as $data) :

            $arr = array(
                "position_id" => $data->id,
                "position_name" => $data->position_name,
                "no_of_candidate" => $data->noc,
                "candidate" => $this->get_candidate($vot_id, $data->id)

            );
            array_push($array_data, $arr);
        endforeach;
        return $array_data;
    }


    function get_candidate($vot_id, $position_id)
    {
        //$results = VotePosition::orderBy('sort_order', 'asc')->get();
        $results = DB::table('vote_candidate')
            ->where('vote_id', $vot_id)
            ->where('vote_position_id', $position_id)
            ->orderBy('id')
            ->get();
        $array_data = array();
        foreach ($results as $data) :

            $arr = array(
                "id" => $data->id,
                "candidate_id" => $data->user_id,
                "candidate_name" => $this->get_user_name_by_id($data->user_id)

            );
            array_push($array_data, $arr);
        endforeach;
        return $array_data;
    }

    function get_user_name_by_id($id)
    {
        $user = DB::table('memberships')->where('id', $id)->first();

        return $user->name;
    }

    //---------------------------------------PREVIOUS INSERT VOTE------------------------------------------------

    //     function insert_vote()
    //     {
    //         /*  $candidate_id2 = array(36, 37);
    //        $candidate_id1 = array(38);
    //        $position = array();
    //        $position1 = array(
    //            "position_id" => 1,
    //            "no_of_candidate" => 1,
    //            "candidate_id" => $candidate_id1
    //        );
    //        $position2 = array(
    //            "position_id" => 2,
    //            "no_of_candidate" => 2,
    //            "candidate_id" => $candidate_id2
    //        );
    //        array_push($position, $position1, $position2);
    //        $arr = array(
    //            "vote_id" => 1,
    //            "voter_id" => 38,
    //            "vote" => $position
    //        );
    //        $arr = json_encode($arr);
    //        $decode_arr = json_decode($arr);
    // print_r($arr);die();
    // */

    //         $vote_data = $_REQUEST['vote_data'];
    //         $decode_arr = json_decode($vote_data);

    //         $vote_id = $decode_arr->vote_id;
    //         $voter_id = $decode_arr->voter_id;

    //         $check_if_vote_done = $this->check_if_vote_done($vote_id, $voter_id);
    //         if ($check_if_vote_done > 0) {
    //             return response()->json([
    //                 'success' => false,
    //                 'data' => "Your have already gave your vote"
    //             ]);
    //             die();
    //         }

    //         foreach ($decode_arr->vote as $row) :
    //             $position_id = $row->position_id;
    //             $no_of_candidate = $row->no_of_candidate;

    //             foreach ($row->candidate_id as $candidates) :
    //                 $values = array(
    //                     'vote_id' => $vote_id,
    //                     'vote_position_id' => $position_id,
    //                     'vote_candidate_id' => $candidates,
    //                     'voter_id' => $voter_id
    //                 );
    //                 $insert_vote_id = DB::table('vote_count')->insertGetId($values);

    //                 if ($insert_vote_id)
    //                     $success = 1;
    //                 else
    //                     $success = 0;

    //             endforeach;

    //         endforeach;


    //         if ($success) {
    //             return response()->json([
    //                 'success' => true,
    //                 'data' => "Your vote completed successfully"
    //             ]);
    //         } else {
    //             return response()->json([
    //                 'success' => false,
    //                 'data' => "not completed"
    //             ]);
    //         }
    //     }


    //     function check_if_vote_done($vote_id,  $voter_id)
    //     {

    //         $results = DB::table('vote_count')
    //             ->where('vote_id', $vote_id)
    //             ->where('voter_id', $voter_id)
    //             ->get();

    //         return count($results);
    //     }

    //-----------------------------------------NEW INSERT VOTE-------------------------------------------
    function insert_vote(Request $req)
    {

        $vote_data = $req->vote_data;
        $decode_arr = ($vote_data);

        $vote_id = $decode_arr['vote_id'];
        $voter_id = $decode_arr['voter_id'];

        $check_if_vote_done = $this->check_if_vote_done($vote_id, $voter_id);
        if ($check_if_vote_done > 0) {
            return response()->json([
                'success' => false,
                'data' => "Your have already gave your vote"
            ]);
            die();
        }

        foreach ($decode_arr['vote'] as $row) :
            $position_id = $row['position_id'];
            $no_of_candidate = $row['no_of_candidate'];

            foreach ($row['candidate_id'] as $candidates) :
                $values = array(
                    'vote_id' => $vote_id,
                    'vote_position_id' => $position_id,
                    'vote_candidate_id' => $candidates,
                    'voter_id' => $voter_id
                );
                $insert_vote_id = DB::table('vote_count')->insertGetId($values);

                if ($insert_vote_id)
                    $success = 1;
                else
                    $success = 0;

            endforeach;

        endforeach;

        if ($success) {
            return response()->json([
                'success' => true,
                'data' => "Your vote completed successfully"
            ]);
        } else {
            return response()->json([
                'success' => false,
                'data' => $voter_id
            ]);
        }
    }


    function check_if_vote_done($vote_id,  $voter_id)
    {

        $results = DB::table('vote_count')
            ->where('vote_id', $vote_id)
            ->where('voter_id', $voter_id)
            ->get();

        return count($results);
    }
}
