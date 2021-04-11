<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
	
	public function __construct()
    {
        //$this->middleware('auth');
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = Setting::findOrFail(1);
      return view('Setting/edit', compact('data'));
    }
 
  
    public function update(Request $request, $id)
    {

        $request->validate([
            'url_ios'    =>  'required',
            'url_android'    =>  'required',
        ]);


        $form_data = array(
            'admin_email'       =>   $request->admin_email,
            'membership_price'       =>   $request->membership_price,
            'url_ios'       =>   $request->url_ios,
            'url_android'       =>   $request->url_android,
            'api_key_ios'       =>   $request->api_key_ios,
            'api_key_android'       =>   $request->api_key_android
        );
  
        Setting::whereId($id)->update($form_data);

        return redirect('settings')->with('success', 'Data is successfully updated');
    }

   
}


	