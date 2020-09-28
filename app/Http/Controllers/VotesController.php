<?php

namespace App\Http\Controllers;

use App\Models\VoteDetail;
use Illuminate\Http\Request;


class VotesController extends Controller
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
        $data = VoteDetail::orderBy('id', 'desc')->paginate(5);
        return view('Vote/index', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Vote/create');
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
            'vote_name' => 'required',
            'voting_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);



        $form_data = array(
            'vote_name' => $request->vote_name,
            'description' => $request->description,
            'voting_date' => $request->voting_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'status' => 1
        );

        VoteDetail::create($form_data);

        return redirect('votes')->with('success', 'Data Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = VoteDetail::findOrFail($id);
        return view('Vote/view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = VoteDetail::findOrFail($id);
        return view('Vote/edit', compact('data'));
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
            'vote_name' => 'required',
            'voting_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);



        $form_data = array(
            'vote_name' => $request->vote_name,
            'description' => $request->description,
            'voting_date' => $request->voting_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'status' => 1
        );

        VoteDetail::whereId($id)->update($form_data);

        return redirect('votes')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = VoteDetail::findOrFail($id);
        $data->delete();

        return redirect('votes')->with('success', 'Data is successfully deleted');
    }
}


