<?php

namespace App\Http\Controllers;
use App\Models\BoardMember;
use App\Models\BoardMembersCategory;
use Illuminate\Http\Request;
use DB;

class BoardMembersController extends Controller
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


        $data = DB::table('board_members')
            ->join('board_members_categories', 'board_members_categories.id', '=', 'board_members.ref_board_members_category_id')
            ->select('board_members.*', 'board_members_categories.board_members_category_name')
            ->get();

        //$data = BoardMember::orderBy('id', 'desc')->paginate(5);
        return view('BoardMember/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = BoardMembersCategory::pluck('board_members_category_name', 'id');
        $status_items=array('Select'=>'Select','1'=>'Active','0'=>'Inactive');
        return view('BoardMember/create', compact('items','status_items'));
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
            'ref_board_members_category_id'    =>  'required',
            'board_members_first_name'     =>  'required',
            'board_members_last_name'     =>  'required',
            'board_members_image_location'     => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'board_members_email_address'     =>  'required|email',
            'board_members_first_name'     =>  'required'
        ]);

        $image = $request->file('board_members_image_location');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'ref_board_members_category_id'       =>   $request->ref_board_members_category_id,
            'board_members_first_name'        =>   $request->board_members_first_name,
            'board_members_last_name'        =>   $request->board_members_last_name,
            'bio'        =>   $request->bio,
            'board_members_image_location'        =>  $new_name,
            'board_member_designation'        =>   $request->board_member_designation,
            'board_members_email_address'        =>   $request->board_members_email_address,
            'board_members_active'        =>   $request->board_members_active,

        );

        BoardMember::create($form_data);

        return redirect('board_members')->with('success', 'Data Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = BoardMember::findOrFail($id);
        return view('BoardMember/view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$board_members_categories = DB::table('board_members_categories')->get();
        $status_items=array('1'=>'Active','0'=>'Inactive');
        $items = BoardMembersCategory::pluck('board_members_category_name', 'id');
        $data = BoardMember::findOrFail($id);
        return view('BoardMember/edit', compact('data','items','status_items'));
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
        $image_name = $request->hidden_image;
        $image = $request->file('board_members_image_location');
        if($image != '')
        {
            $request->validate([
                'ref_board_members_category_id'    =>  'required',
                'board_members_first_name'     =>  'required',
                'board_members_last_name'     =>  'required',
                'board_members_image_location'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'board_members_email_address'     =>  'required|email',
                'board_members_first_name'     =>  'required'
            ]);

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $request->validate([
                'ref_board_members_category_id'    =>  'required',
                'board_members_first_name'     =>  'required',
                'board_members_last_name'     =>  'required',
                'board_members_email_address'     =>  'required|email',
                'board_members_first_name'     =>  'required'
            ]);
        }

        $form_data = array(
            'ref_board_members_category_id'       =>   $request->ref_board_members_category_id,
            'board_members_first_name'        =>   $request->board_members_first_name,
            'board_members_last_name'        =>   $request->board_members_last_name,
            'bio'        =>   $request->bio,
            'board_members_image_location'        =>  $image_name,
            'board_member_designation'        =>   $request->board_member_designation,
            'board_members_email_address'        =>   $request->board_members_email_address,
            'board_members_active'        =>   $request->board_members_active,

        );

        BoardMember::whereId($id)->update($form_data);

        return redirect('board_members')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = BoardMember::findOrFail($id);
        $data->delete();

        return redirect('board_members')->with('success', 'Data is successfully deleted');
    }
}


