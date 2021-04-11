<?php

namespace App\Http\Controllers\api;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;






class AuthAPIController extends Controller
{

    public function forgotPassword(Request $request){
        $input = $request->only('email');
        $validator = Validator::make($input, [
            'email' => "required|email"
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $response = Password::sendResetLink($input);
       // $users_f = Password::getUser($input);
       // $token = Password::createToken($users_f);
       // print_r($input);


        $email=$input["email"];

        $get_email = DB::select(DB::raw(" SELECT email from memberships where  email='$email'  "));
        $get_email_address =count($get_email);

        if($get_email_address > 0)
        {
            $message = $response == Password::RESET_LINK_SENT ? " Password reset link send to you email ( $email ) address " : GLOBAL_SOMETHING_WANTS_TO_WRONG;

            if($message)
                return response()->json(['success' => true,'message'=>$message]);
            else
                return response()->json(['success' => false]);
        }
        else
            return response()->json(['success' => false,'message'=>"This email is not found in our system"]);

    }



    /// not use yet
    public function passwordReset(Request $request){
        $input = $request->only('email','token', 'password', 'password_confirmation');
        $validator = Validator::make($input, [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $response = Password::reset($input, function ($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
        });
        $message = $response == Password::PASSWORD_RESET ? 'Password reset successfully' : GLOBAL_SOMETHING_WANTS_TO_WRONG;
        return response()->json($message);
    }
}










