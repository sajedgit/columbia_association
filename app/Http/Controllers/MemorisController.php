<?php

namespace App\Http\Controllers;

use App\Models\Memorie;
use Illuminate\Http\Request;
use File;

class MemorisController extends Controller
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
        $data = Memorie::orderBy('id', 'desc')->paginate(5);
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
        $status_items = $this->getStatusItem();
        return view('Memory/create', compact('status_items'));
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
            'memories_name' => 'required|unique:memories',
            'memories_thumb' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('memories_thumb');
        $new_name ='public/images/memory/'. rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/memory'), $new_name);

        $form_data = array(
            'memories_name' => $request->memories_name,
            'memories_details' => $request->memories_details,
            'memories_thumb' => $new_name,
            'memories_created_date_time' => date("Y-m-d"),
            'memories_active' => $request->memories_active,
        );

        Memorie::create($form_data);

        return redirect('memories')->with('success', 'Data Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$data = Memorie::findOrFail($id);
        $data = Memorie::with('memory_photo')
            ->where('id',$id)
            ->get();
        //return response()->json(['success' => true, 'data' => $data]);die();
        $memories_photo=$data[0]->memory_photo;
        return view('Memory/view', compact('data','memories_photo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Memorie::findOrFail($id);
        return view('Memory/edit', compact('data'));
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
        $image_name = $request->hidden_image;
        $image_old = $request->hidden_image;
        $image = $request->file('memories_thumb');

        if ($image != '') {

            $request->validate([
                'memories_name' => 'required|unique:memories,memories_name,'.$id,
                'memories_thumb' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $image_name ='public/images/memory/'. rand() . '.' . $image->getClientOriginalExtension();
            $file_uplaod=$image->move(public_path('images/memory'), $image_name);


        } else {

            $request->validate([
                'memories_name' => 'required|unique:memories,memories_name,'.$id
            ]);
        }

        $form_data = array(
            'memories_name' => $request->memories_name,
            'memories_details' => $request->memories_details,
            'memories_thumb' => $image_name,
            'memories_created_date_time' => date("Y-m-d"),
            'memories_active' => $request->memories_active,
        );

        Memorie::whereId($id)->update($form_data);

        return redirect('memories')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Memorie::findOrFail($id);
        $data->delete();



        return redirect('memories')->with('success', 'Data is successfully deleted');
    }
}


