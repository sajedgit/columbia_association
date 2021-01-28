<?php

namespace App\Http\Controllers;
use App\Models\BoardMembersCategory;
use Illuminate\Http\Request;

class BoardMembersCategoriesController extends Controller
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

        $data = BoardMembersCategory::orderBy('board_members_category_position', 'asc')->paginate(5);

        return view('BoardMembersCategory/index', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BoardMembersCategory/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'board_members_category_name'    =>  'required',
            'board_members_category_position'     =>  'required'
        ]);


        $form_data = array(
            'board_members_category_name'       =>   $request->board_members_category_name,
            'board_members_category_position'        =>   $request->board_members_category_position
        );

        BoardMembersCategory::create($form_data);

        return redirect('board_members_categories')->with('success', 'Data Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = BoardMembersCategory::findOrFail($id);
        return view('BoardMembersCategory/view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = BoardMembersCategory::findOrFail($id);
        return view('BoardMembersCategory/edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'board_members_category_name'    =>  'required',
            'board_members_category_position'     =>  'required'
        ]);


        $form_data = array(
            'board_members_category_name'       =>   $request->board_members_category_name,
            'board_members_category_position'        =>   $request->board_members_category_position
        );

        BoardMembersCategory::whereId($id)->update($form_data);

        return redirect('board_members_categories')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = BoardMembersCategory::findOrFail($id);
        $data->delete();

        return redirect('board_members_categories')->with('success', 'Data is successfully deleted');
    }
}


