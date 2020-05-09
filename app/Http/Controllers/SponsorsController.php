<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use File;

class SponsorsController extends Controller
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
        $data = Sponsor::orderBy('id', 'desc')->paginate(5);
        return view('Sponsor/index', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Sponsor/create');
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
            'sponsor_name' => 'required',
            'sponsor_details' => 'required',
            'sponsor_address' => 'required',
            'sponsor_email' => 'required|email',
            'sponsor_website' => 'required|active_url',
            'sponsor_logo_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $image = $request->file('sponsor_logo_photo');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/sponsor'), $new_name);

        $form_data = array(
            'sponsor_name' => $request->sponsor_name,
            'sponsor_details' => $request->sponsor_details,
            'sponsor_address' => $request->sponsor_address,
            'sponsor_email' => $request->sponsor_email,
            'sponsor_website' => $request->sponsor_website,
            'sponsor_logo_photo' => $new_name,
            'sponsor_created_datetime' => date("Y-m-d H:i:s")
        );

        Sponsor::create($form_data);

        return redirect('sponsors')->with('success', 'Data Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Sponsor::findOrFail($id);
        return view('Sponsor/view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Sponsor::findOrFail($id);
        return view('Sponsor/edit', compact('data'));
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
        $image = $request->file('sponsor_logo_photo');

        if ($image != '') {

            $request->validate([
                'sponsor_name' => 'required',
                'sponsor_details' => 'required',
                'sponsor_address' => 'required',
                'sponsor_email' => 'required|email',
                'sponsor_website' => 'required|active_url'
            ]);

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $file_uplaod=$image->move(public_path('images/sponsor'), $image_name);
            if($file_uplaod)
              File::delete(public_path('images/sponsor/'.$image_old));
            else
                echo "Error in file uploading";



        } else {

            $request->validate([
                'sponsor_name' => 'required',
                'sponsor_details' => 'required',
                'sponsor_address' => 'required',
                'sponsor_email' => 'required|email',
                'sponsor_website' => 'required|active_url'
            ]);
        }

        $form_data = array(
            'sponsor_name' => $request->sponsor_name,
            'sponsor_details' => $request->sponsor_details,
            'sponsor_address' => $request->sponsor_address,
            'sponsor_email' => $request->sponsor_email,
            'sponsor_website' => $request->sponsor_website,
            'sponsor_logo_photo' => $image_name,
            'sponsor_edited_date_time' => date("Y-m-d H:i:s")
        );

        Sponsor::whereId($id)->update($form_data);

        return redirect('sponsors')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Sponsor::findOrFail($id);
        $data->delete();
        File::delete(public_path('images/sponsor/'.$data->sponsor_logo_photo));

        return redirect('sponsors')->with('success', 'Data is successfully deleted');
    }
}

	
	