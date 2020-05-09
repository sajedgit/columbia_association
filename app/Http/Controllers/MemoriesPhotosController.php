<?php

namespace App\Http\Controllers;

use App\Models\MemoriesPhoto;
use App\Models\Memorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use URL;

class MemoriesPhotosController extends Controller
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

        $data = DB::table('memories_photos')
            ->join('memories', 'memories.id', '=', 'memories_photos.ref_memories_id')
            ->select('memories_photos.*', 'memories.memories_name')
            ->get();

        return view('MemoriesPhoto/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Memorie::pluck('memories_name', 'id');
        $items->prepend('Please Select', '');
        return view('MemoriesPhoto/create', compact('items'));
    }

    public function add(Request $request)
    {
        $memory_id = $request->memory_id;
        $items = Memorie::pluck('memories_name', 'id');
        //$items->prepend('Please Select', '');
        return view('MemoriesPhoto/add', compact('items','memory_id'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image_code = '';
        $images = $request->file('file');
        $ref_memories_id = $request->ref_memories_id;
		$img_src=URL::to('/');

        foreach ($images as $image) {
            $new_name ='public/images/memory/'. rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/memory'), $new_name);
            $image_code .= '<div class="col-md-3" style="margin-bottom:24px;"><img src=" '.$img_src.'/'.$new_name . '" class="img-thumbnail" /></div>';
            $this->image_upload($ref_memories_id,$new_name);
        }

        $output = array(
            'success' => 'Images uploaded successfully',
            'image' => $image_code
        );

        return response()->json($output);
    }

    public function image_upload($ref_memories_id,$new_name)
    {
        $form_data = array(
            'ref_memories_id' => $ref_memories_id,
            'memories_photo_location' => $new_name,
            'memories_photo_uploaded_date_time' => date('Y-m-d'),
            'memories_photo_active' => 1
        );
        MemoriesPhoto::create($form_data);
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = MemoriesPhoto::findOrFail($id);
//        $data = DB::table('memories_photos')
//            ->join('memories', 'memories.id', '=', 'memories_photos.ref_memories_id')
//            ->select('memories_photos.*', 'memories.memories_name')
//            ->where('memories_photos.id',$id)
//            ->get();
        return view('MemoriesPhoto/view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = MemoriesPhoto::findOrFail($id);
        return view('MemoriesPhoto/edit', compact('data'));
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
        $image = $request->file('image');
        if ($image != '') {
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'image' => 'image|max:2048'
            ]);

            $image_name ='public/images/memory/'.  rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/memory'), $image_name);
        } else {
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required'
            ]);
        }

        $form_data = array(
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'image' => $image_name
        );

        MemoriesPhoto::whereId($id)->update($form_data);

        return redirect('MemoriesPhoto/index')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = MemoriesPhoto::findOrFail($id);
        $data->delete();

        return redirect('memories_photos')->with('success', 'Data is successfully deleted');
    }
}


