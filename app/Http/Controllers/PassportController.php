<?php
 
namespace App\Http\Controllers;
 
use App\Membership;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
 
class PassportController extends Controller
{
	public $successStatus = 200;
	
    /**
     * Handles Registration Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
      /*   $this->validate($request, [
            'name' => 'required|min:3',
            'username' => 'required|min:6',
            'email' => 'required|email|unique:memberships',
            'password' => 'required|min:6',
        ]); */
		
		 $validator = Validator::make($request->all(), [ 
            'name' => 'required|min:3',
            'username' => 'required|min:6|unique:memberships',
            'email' => 'required|email|unique:memberships',
            'password' => 'required|min:6', 
        ]);
		
		if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
 
        /* $user = Membership::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'active' => 0
			
        ]);
        $token = $user->createToken('TutsForWeb')->accessToken;
        return response()->json(['token' => $token], 200); */
		
		$input = $request->all(); 
        $input['password'] = bcrypt($input['password']); 
        $input['active'] = 0; 
        $user = Membership::create($input); 
        $success['token'] =  $user->createToken('MyApp')-> accessToken; 
        $success['name'] =  $user->name;
		return response()->json(['success'=>$success], $this-> successStatus); 
		
    }
	
	
 
    /**
     * Handles Login Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' =>  $request->password
        ];
        
	   /*  if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('MyApp')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'UnAuthorised'], 401);
        }  */
		//die();
		// print_r(Auth::attempt($credentials));die();
	    if(Auth::attempt($credentials)){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            return response()->json(['success' => $success], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        }  
		
		
    }
 
    /**
     * Returns Authenticated User Details
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function details()
    {
       // return response()->json(['user' => auth()->user()], 200);
		
		$user = Auth::user(); 
        return response()->json(['success' => $user], $this-> successStatus); 
    }
	
	
}