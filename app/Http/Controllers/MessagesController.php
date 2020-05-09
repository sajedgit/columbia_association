<?php

namespace App\Http\Controllers;
use App\Models\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
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
        $data = Message::orderBy('id', 'desc')->paginate(5); 
        return view('Message/index', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Message/create');
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
            'message_details'    =>  'required'
        ]);


        $form_data = array(
            'message_details'       =>   $request->message_details,
            'message_active'        =>   1,
            'message_created_datetime'   =>   date("Y-m-d H:i:s")
        );

        Message::create($form_data);

        return redirect('messages')->with('success', 'Data Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Message::findOrFail($id);
        return view('Message/view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Message::findOrFail($id);
        return view('Message/edit', compact('data'));
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
            'message_details'    =>  'required'
        ]);


        $form_data = array(
            'message_details'       =>   $request->message_details,
            'message_active'        =>   1,
            'message_edited_datetime'   =>   date("Y-m-d H:i:s")
        );
  
        Message::whereId($id)->update($form_data);

        return redirect('messages')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Message::findOrFail($id);
        $data->delete();

        return redirect('messages')->with('success', 'Data is successfully deleted');
    }
}

	
	