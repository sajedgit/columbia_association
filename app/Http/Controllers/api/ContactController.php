<?php

namespace App\Http\Controllers\api;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;






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


        //$email=$input["email"];
        $message = "kjdlkfa sdfklasjdlf";

        return response()->json($message);
    }

}










