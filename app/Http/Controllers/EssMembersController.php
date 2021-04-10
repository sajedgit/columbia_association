<?php

namespace App\Http\Controllers;
use App\Mail\SendMemberMail;
use App\Models\EssMember;
use App\Models\Membership;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class EssMembersController extends Controller
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


        $data = DB::table('memberships')
            ->where("ess_id",1)
            ->select('*')
            ->get();
       // print_r($data);die();

        //$data = BoardMember::orderBy('id', 'desc')->paginate(5);
        return view('EssMember/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $status_items=array(''=>'Select','1'=>'Active','0'=>'Inactive');
        $type=array(''=>'Select','Cash'=>'Cash','Online Payment'=>'Online Payment');
        return view('EssMember/create', compact('type','status_items'));
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
            'type'    =>  'required',
            'name'     =>  'required',
            'email'     =>  'required|email|unique:ess_members',
            'active'     =>  'required'
        ]);

//        $form_data = array(
//            'ess_type'       =>   $request->type,
//            'name'        =>   $request->name,
//            'email'        =>   $request->email,
//            'created_at' => date('Y-m-d H:i:s'),
//            'active'        =>   $request->active,
//
//        );
        $password=$this->password_generate(8);
        $form_data = array(
            'user_type_id'       => 2,
            'ess_type'        =>    $request->type,
            'ess_id'        =>   1,
            'name'        =>   $request->name,
            'username'        =>   $request->name,
            'password'        =>    Hash::make($password),
            'email'        =>    $request->email,
            'photo'        =>   "no_image.jpg",
            'active'        =>  $request->active,
            'created_at' => date('Y-m-d H:i:s'),

        );

        $create_ess_member=Membership::create($form_data);

//        if($create_ess_member->id)
//        {
//            $this->insert_member($form_data,$create_ess_member->id);
//
//        }
        if($create_ess_member->id)
        {
            $this->send_mail($form_data);
        }

        return redirect('ess_members')->with('success', 'Data Added successfully.');
    }



    public function insert_member($form_data,$ess_id)
    {
        $password=$this->password_generate(8);
        $data = array(
            'user_type_id'       => 2,
            'ess_type'        =>   $form_data["type"],
            'ess_id'        =>   $ess_id,
            'name'        =>   $form_data["name"],
            'username'        =>   $form_data["name"],
            'password'        =>    Hash::make($password),
            'email'        =>   $form_data["email"],
            'photo'        =>   "no_image.jpg",
            'active'        =>  $form_data["active"],
            'created_at' => $form_data["created_at"],

        );
        $create_membership=Membership::create($data);
        $data["password"]=$password;

        if($create_membership->id)
        {
           $this->send_mail($data);
        }
    }

    public function send_mail($data)
    {
        $subject="Membership Confirmation";
        $mail_to = $data["email"];
        //$mail_to = "sajedaiub@gmail.com";
       // $cc = "nypdbapa@gmail.com";
        $cc = "sajedaiub@gmail.com";
        $bcc = "sajedaiub@gmail.com";


        Mail::to($mail_to)
            ->cc($cc)
            ->bcc($bcc)
            ->send(new SendMemberMail($data,$subject));

    }

    function password_generate($chars)
    {
        $data = '@#$%&*()1234567890@#$%&*()ABCDEFGHIJKLMNOPQRSTUVWXYZ@#$%&*()abcefghijklmnopqrstuvwxyz@#$%&*()';
        return substr(str_shuffle($data), 0, $chars);
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
        return view('EssMember/view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $status_items=array('1'=>'Active','0'=>'Inactive');
        $type=array(''=>'Select','Cash'=>'Cash','Online Payment'=>'Online Payment');
        $data = Membership::findOrFail($id);
        return view('EssMember/edit', compact('data','type','status_items'));
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
            'type'    =>  'required',
            'name'     =>  'required',
            'email'     =>  'required|email',
            'active'     =>  'required'
        ]);


        $form_data = array(
            'ess_type'        =>    $request->type,
            'name'        =>   $request->name,
            'email'        =>    $request->email,
            'active'        =>  $request->active,

        );


        $updated=Membership::whereId($id)->update($form_data);

//        if($updated)
//        {
//
//            $data = array(
//                'ess_type'        =>   $form_data["type"],
//                'name'        =>   $form_data["name"],
//                'email'        =>   $form_data["email"],
//                'active'        =>  $form_data["active"]
//            );
//            $Membership_updated=Membership::where("ess_id",$id)->update($data);
//
//        }

        return redirect('ess_members')->with('success', 'Data is successfully updated');
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

        return redirect('ess_members')->with('success', 'Data is successfully deleted');
    }
}


