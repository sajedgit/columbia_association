<?php

namespace App\Http\Controllers\api;

use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;






class ContactController extends Controller
{

    public function index(Request $request){

        $input = $request->only('name','email','subject','msg');
        $validator = Validator::make($input, [
            'name' => "required",
            'email' => "required|email",
            'subject' => "required",
            'msg' => "required",
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }


        $name=$input["name"];
        $email=$input["email"];
        $subject=$input["subject"];
        $msg=$input["msg"];

        $mail_to = $this->adminEmail();

        $send_email=Mail::to($mail_to)
            ->send(new ContactUsMail($name,$email,$subject,$msg));

       // echo "mail send successfully";
        if($send_email)
            return response()->json(['success'=>true,'data'=>"mail send successfully"]);
        else
            return response()->json(['success'=>false]);


    }

}










