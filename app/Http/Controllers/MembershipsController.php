<?php

namespace App\Http\Controllers;
use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipsController extends Controller
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
        $data = Membership::where('user_type_id', '<>',1)
            ->orderBy('id', 'desc')
            ->get();

        return view('Membership/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status_items=array('Select'=>'Select','1'=>'Active','0'=>'Inactive');
        return view('Membership/create', compact('status_items'));
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
            'name'    =>  'required',
            'username'     =>  'required',
            'password'     =>  'min:6|required',
			'password_confirmation' => 'min:6|same:password',
            'email'     =>  'required',
            'active'         =>  'required'
        ]);


        $form_data = array(
            'name'       =>   $request->name,
            'username'        =>   $request->username,
            'password'        =>   bcrypt($request->password),
            'email'        =>   $request->email,
            'user_type_id'        =>  2,
            'active'        =>   $request->active,
            'created_at'        =>   date("Y-m-d"),
            'updated_at'        =>   date("Y-m-d")
        );

        Membership::create($form_data);

        return redirect('memberships')->with('success', 'Data Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Membership::findOrFail($id);
        return view('Membership/view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Membership::findOrFail($id);
        $status_items=array('Select'=>'Select','1'=>'Active','0'=>'Inactive');
        return view('Membership/edit', compact('data','status_items'));
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
			'name'    =>  'required',
			'username'     =>  'required',
			'password'     =>  'min:6|required',
			'password_confirmation' => 'min:6|same:password',
			'email'     =>  'required',
			'active'         =>  'required'
		]);

		$messages = [
				'password_confirmation.same' => 'Password Confirmation should match the Password',
			];

        $form_data = array(
            'name'       =>   $request->name,
            'username'        =>   $request->username,
            'password'        =>   bcrypt($request->password),
            'email'        =>   $request->email,
            'user_type_id'        =>  2,
            'active'        =>   $request->active,
            'updated_at'        =>   date("Y-m-d")
        );



        Membership::whereId($id)->update($form_data);

        return redirect('memberships')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Membership::findOrFail($id);
        $data->delete();

        return redirect('memberships')->with('success', 'Data is successfully deleted');
    }
}


