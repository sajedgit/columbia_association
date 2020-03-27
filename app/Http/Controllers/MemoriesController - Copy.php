<?php

namespace App\Http\Controllers;
use App\Models\Memory;
use Illuminate\Http\Request;

class MemoriesController extends Controller
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
        $data = Memory::orderBy('id', 'desc')->paginate(5);
        return view('Memory/index', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Memory/create');
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
            'memories_name'    =>  'required'
        ]);



        $form_data = array(
            'memories_name'       =>   $request->memories_name,
            'memories_details'        =>   $request->memories_details,
            'memories_created_date_time'            =>   date("Y-m-d"),
            'memories_active'            =>    $request->memories_active,
        );

        Memory::create($form_data);

        return redirect('memories')->with('success', 'Data Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Memory::findOrFail($id);
        return view('Memory/view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Memory::findOrFail($id);
        return view('Memory/edit', compact('data'));
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
            'memories_name'    =>  'required'
        ]);

        $form_data = array(
            'memories_name'       =>   $request->memories_name,
            'memories_details'        =>   $request->memories_details,
            'memories_created_date_time'            =>   date("Y-m-d"),
            'memories_active'            =>    $request->memories_active,
        );

        Memory::whereId($id)->update($form_data);

        return redirect('memories')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Memory::findOrFail($id);
        $data->delete();

        return redirect('memories')->with('success', 'Data is successfully deleted');
    }
}


