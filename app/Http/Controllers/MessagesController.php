<?php

namespace App\Http\Controllers;
use App\Membership;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Mail\SendMessageMail;
use Illuminate\Support\Facades\Mail;

class MessagesController extends Controller
{
	
	public function __construct()
    {
        $this->middleware('admin_middleware');
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
            'message_details'       =>  addslashes($request->message_details),
            'message_active'        =>   1,
            'message_created_datetime'   =>   date("Y-m-d H:i:s")
        );

        $message=Message::create($form_data);
        if($message)
        {
            $subject="News From Columbia ADMIN";
            $msg=$request->message_details;

            $results = Membership::orderBy('id', 'desc')
                ->where("active",1)
                ->get();

            $cc = "sajedaiub@gmail.com";
            $bcc = "sajedaiub@gmail.com";

            foreach ($results as $row)
            {
                $mail_to = $row->email;
                $user_name = $row->name;
                Mail::to($mail_to)
                    ->cc($cc)
                    ->bcc($bcc)
                    ->send(new SendMessageMail($msg,$subject,$user_name));

                //sleep(3);
            }



        }

        return redirect('messages')->with('success', 'Message Send successfully.');
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
            'message_details'       =>    addslashes($request->message_details),
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


    public function president()
    {

        $data = DB::table('msg_president')
            ->select('*')
            ->where("id",1)
            ->get();
        $data=$data[0];
        $table="msg_president";
        $url="president";
        return view('Message/edit_p_vp_gs', compact('data','table','url'));
    }


    public function vice_president()
    {
        $data = DB::table('msg_vp')
            ->select('*')
            ->where("id",1)
            ->get();
        $data=$data[0];
        $table="msg_vp";
        $url="vice_president";
        return view('Message/edit_p_vp_gs', compact('data','table','url'));
    }


    public function general_secretary()
    {
        $data = DB::table('msg_gs')
            ->select('*')
            ->where("id",1)
            ->get();
        $data=$data[0];
        $table="msg_gs";
        $url="general_secretary";
        return view('Message/edit_p_vp_gs', compact('data','table','url'));
    }




    public function messages_update(Request $request)
    {
        $table_name=$request->table_name;
        $url=$request->url;
        $title=$request->title;
        $description=$request->description;
        $form_data = array(
            'title'  => $title,
            'description'  =>   $description,
            'msg_date'   =>   date("Y-m-d")
        );


        $affected = DB::table($table_name)
            ->where('id', 1)
            ->update($form_data);

        return redirect()->route($url)->with('success', 'Data is successfully updated');
    }
}


	