<?php

namespace App\Http\Controllers;


use App\Models\VotePosition;
use App\Models\VoteDetail;
use App\Models\VoteCandidate;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class VotePositionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      //  echo \Auth::user()->user_type_id;die();

        $data = DB::table('vote_position')
            ->join('vote_details', 'vote_details.id', '=', 'vote_position.vote_id')
            ->select('vote_position.*', 'vote_details.vote_name')
            ->get();

        return view('VotePosition/index', compact('data'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = VoteDetail::pluck('vote_name', 'id');
        $member = Membership::pluck('name', 'id');
        return view('VotePosition/create', compact('items','member'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $noc= $request->noc;
       $member= $request->member;

        $request->validate([
            'vote_id' => 'required',
            'position_name' => 'required',
            'noc' => 'required',
            'sort_order' => 'required',
            'member' => "required|min:1|max:$noc",
        ]);



        $form_data = array(
            'vote_id' => $request->vote_id,
            'position_name' => $request->position_name,
            'noc' => $request->noc,
            'sort_order' => $request->sort_order,
            'status' => 1
        );

        $position=VotePosition::create($form_data);

        $this->entry($request->vote_id,$position->id,$member,"insert");

        return redirect('votes_position')->with('success', 'Data Added successfully.');
    }

    public function entry( $vote_id,$position_id,$member,$action)
    {
        if($action=="update")
        {
            DB::table('vote_candidate')
                ->where('vote_id', $vote_id)
                ->where('vote_position_id', $position_id)
                ->delete();
        }

        foreach ($member as $user):
            $form_data = array(
                'vote_id' => $vote_id,
                'vote_position_id' => $position_id,
                'user_id' => $user,
                'status' => 1
            );
           VoteCandidate::create($form_data);
        endforeach;

    }



    public static function get_member($vote_id,$position_id )
    {
       $arr=array();
       $users = DB::select("SELECT user_id FROM vote_candidate WHERE vote_id=$vote_id and vote_position_id=$position_id ");
       foreach($users as $row)
       {
          array_push($arr,$row->user_id);
       }


        return $arr;

    }
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$data = VotePosition::findOrFail($id);

        $data = DB::table('vote_position')
            ->join('vote_details', 'vote_details.id', '=', 'vote_position.vote_id')
            ->select('vote_position.*', 'vote_details.vote_name')
            ->where("vote_position.id",$id)
            ->get();

        return view('VotePosition/view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = VotePosition::findOrFail($id);
        $items = VoteDetail::pluck('vote_name', 'id');
        $member = Membership::pluck('name', 'id');
        return view('VotePosition/edit', compact('data','items','member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $noc= $request->noc;
        $member= $request->member;

        $request->validate([
            'vote_id' => 'required',
            'position_name' => 'required',
            'noc' => 'required',
            'sort_order' => 'required',
             'member' => "required|min:1|max:$noc"
        ]);



        $form_data = array(
            'vote_id' => $request->vote_id,
            'position_name' => $request->position_name,
            'noc' => $request->noc,
            'sort_order' => $request->sort_order,
            'status' => 1
        );

        VotePosition::whereId($id)->update($form_data);

        $this->entry($request->vote_id,$id,$member,"update");

        return redirect('votes_position')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = VotePosition::findOrFail($id);
        $data->delete();

        return redirect('votes_position')->with('success', 'Data is successfully deleted');
    }
}


