<?php

namespace App\Http\Controllers;

use App\Models\VotePosition;
use App\Models\VoteDetail;
use App\Models\VoteCandidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class VoteCandidatesController extends Controller
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


        $data = DB::table('vote_candidate')
            ->join('vote_details', 'vote_details.id', '=', 'vote_candidate.vote_id')
            ->join('vote_position', 'vote_position.id', '=', 'vote_candidate.vote_position_id')
            ->join('memberships', 'memberships.id', '=', 'vote_candidate.user_id')
            ->select('vote_candidate.*', 'vote_details.vote_name', 'vote_position.position_name', 'memberships.name')
            ->get();



        return view('Candidate/index', compact('data'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vote = VoteDetail::pluck('vote_name', 'id');
        $position = VotePosition::pluck('position_name', 'id');
        return view('Candidate/create', compact('vote','position'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'vote_id' => 'required',
            'position_name' => 'required',
            'noc' => 'required',
            'sort_order' => 'required'
        ]);



        $form_data = array(
            'vote_id' => $request->vote_id,
            'position_name' => $request->position_name,
            'noc' => $request->noc,
            'sort_order' => $request->sort_order,
            'status' => 1
        );

        VotePosition::create($form_data);

        return redirect('votes_position')->with('success', 'Data Added successfully.');
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
        return view('VotePosition/edit', compact('data','items'));
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

        $request->validate([
            'vote_id' => 'required',
            'position_name' => 'required',
            'noc' => 'required',
            'sort_order' => 'required'
        ]);



        $form_data = array(
            'vote_id' => $request->vote_id,
            'position_name' => $request->position_name,
            'noc' => $request->noc,
            'sort_order' => $request->sort_order,
            'status' => 1
        );

        VotePosition::whereId($id)->update($form_data);

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


