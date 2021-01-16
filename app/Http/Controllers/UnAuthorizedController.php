<?php

namespace App\Http\Controllers;


use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;


class UnAuthorizedController extends Controller
{



    public function index(Request $request)
    {
      //  echo  $request->user()->user_type_id;die();
        $role="Admin";
        auth()->logout();
        echo "<script>setTimeout(function(){ window.location.href = 'login'; }, 5000);</script>";
        return view('unauthorized',compact('role'));
    }

}
