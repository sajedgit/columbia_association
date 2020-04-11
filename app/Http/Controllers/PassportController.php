<?php
 
namespace App\Http\Controllers;
 
use App\Membership;
use App\Models\MemberDevice;
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
        $input['user_type_id'] = 2; 
        $input['active'] = 0; 
        $user = Membership::create($input); 
        $success['token'] =  $user->createToken('MyApp')-> accessToken; 
        $success['name'] =  $user->name;
		return response()->json(['success'=>true,'data'=>$success], $this-> successStatus); 
		
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
            'password' =>  $request->password,
        ];
        
	  
	    if(Auth::attempt($credentials)){ 
            $user = Auth::user(); 
			
				$member_devices = MemberDevice::create([
					'ref_member_device_membership_id' => $user->id,
					'member_device_os_type' => $request->member_device_os_type,
					'member_device_token_id' => $user->createToken('MyApp')-> accessToken,
					'member_device_unique_id' => $request->member_device_unique_id
					
				]);
			
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            return response()->json(['success'=>true,'data'=>$success], $this-> successStatus); 
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
        return response()->json(['success' => true,'data' => $user], $this-> successStatus); 
    }
	
	
}