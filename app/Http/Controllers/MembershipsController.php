<?php

namespace App\Http\Controllers;
use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Membership::orderBy('id', 'desc')->paginate(5);
        return view('Membership/index', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Membership/create');
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
            'membership_username'    =>  'required',
            'membership_password_value'     =>  'required',
            'membership_status'     =>  'required',
            'membership_expired_date'         =>  'required'
        ]);



        $form_data = array(
            'membership_username'       =>   $request->membership_username,
            'membership_password_value'        =>   $request->membership_password_value,
            'membership_status'        =>   $request->membership_status,
            'membership_expired_date'        =>   $request->membership_expired_date,
            'membership_creating_datetime'        =>   date("Y-m-d")
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
        return view('Membership/edit', compact('data'));
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
                'membership_username'    =>  'required',
                'membership_password_value'     =>  'required',
                'membership_status'     =>  'required',
                'membership_expired_date'         =>  'required'
            ]);

        $form_data = array(
            'membership_username'       =>   $request->membership_username,
            'membership_password_value'        =>   $request->membership_password_value,
            'membership_status'        =>   $request->membership_status,
            'membership_expired_date'        =>   $request->membership_expired_date
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


