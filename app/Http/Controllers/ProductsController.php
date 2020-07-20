<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use File;

class ProductsController extends Controller
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
        $data = Product::orderBy('id', 'desc')->paginate(5);
        return view('Product/index', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Product/create');
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
            'product_name' => 'required',
            'product_description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'product_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $image = $request->file('product_photo');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/product'), $new_name);

        $form_data = array(
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'price' => $request->price,
            'stock' => $request->stock,
            'photo' => $new_name,
            'status' => $request->stock
        );

        Product::create($form_data);

        return redirect('products')->with('success', 'Data Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Product::findOrFail($id);
        return view('Product/view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::findOrFail($id);
        return view('Product/edit', compact('data'));
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
        $image = $request->file('product_photo');

        if ($image != '') {

            $request->validate([
                'product_name' => 'required',
                'product_description' => 'required',
                'price' => 'required',
                'stock' => 'required'
            ]);

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $file_uplaod=$image->move(public_path('images/product'), $image_name);
            if($file_uplaod)
              File::delete(public_path('images/product/'.$image_old));
            else
                echo "Error in file uploading";



        } else {

            $request->validate([
                'product_name' => 'required',
                'product_description' => 'required',
                'price' => 'required',
                'stock' => 'required'
            ]);
        }



        $form_data = array(
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'price' => $request->price,
            'stock' => $request->stock,
            'photo' => $image_name,
            'status' => $request->stock
        );

        Product::whereId($id)->update($form_data);

        return redirect('products')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::findOrFail($id);
        $data->delete();
        File::delete(public_path('images/product/'.$data->sponsor_logo_photo));

        return redirect('products')->with('success', 'Data is successfully deleted');
    }
}

	
	