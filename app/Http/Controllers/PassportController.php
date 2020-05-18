<?php
 
namespace App\Http\Controllers;
 
use App\Membership;
use App\Models\MembershipPayment;
use App\Models\MemberJobInfo;
use App\Models\MemberPersonalInfo;
use App\Models\MemberDevice;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use DB;

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
        
       /* ----------previous validation------------------- */
       /* $validator = Validator::make($request->all(), [ 
            'name' => 'required|min:3',
            'username' => 'required|min:6|unique:memberships',
            'email' => 'required|email|unique:memberships',
            'password' => 'required|min:6', 
        ]);*/
		
        $validator = Validator::make($request->all(), [ 
            'name' => 'required|min:3',
            'username' => 'required|min:6|unique:memberships',
            'email' => 'required|email|unique:memberships',
            'password' => 'required|min:6',
            'member_first_name' => 'required',
            'member_last_name' => 'required',
            'member_birth_date' => 'required|date',
            'member_gender' => 'required',
            'member_address' => 'required',
            'member_zip_code' => 'required',
            'member_tax_reg_no' => 'required',
            'member_command_code' => 'required',
            'member_command_name' => 'required',
            'member_rank' => 'required',
            'member_shield' => 'required',
            'member_appointment_date' => 'required|date',
            'member_promoted_date' => 'required|date',
            'member_boro' => 'required',
            'member_benificiary' => 'required',
            'member_reference_no' => 'required',
            'member_retired' => 'required',
            'membership_payment_ess' => 'required', 
        ]);
		
		if ($validator->fails()) { 
            return response()->json(['success'=>false,'error'=>$validator->errors()], 401);            
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
        
    /* ----------previous insertion------------------- */
	/*  $input = $request->all(); 
        $input['password'] = bcrypt($input['password']); 
        $input['user_type_id'] = 2; 
        $input['active'] = 0; 
        $user = Membership::create($input); 
        $success['token'] =  $user->createToken('MyApp')-> accessToken; 
        $success['name'] =  $user->name;
        return response()->json(['success'=>true,'data'=>$success], $this-> successStatus); */
        
        DB::beginTransaction();

        try {

            $login_data = array(
                'name'            =>   $request->name,
                'username'        =>   $request->username,
                'password'        =>   bcrypt($request->password),
                'email'           =>   $request->email,
                'user_type_id'    =>   2,
                'active'          =>   1,
                'created_at'      =>   date("Y-m-d"),
                'updated_at'      =>   date("Y-m-d")
            );
    
            $user = Membership::create($login_data);
    
            $personal_data = array(
                'ref_member_personal_info_membership_id' => $user->id,
                'member_first_name' =>   $request->member_first_name,
                'member_last_name'  =>   $request->member_last_name,
                'member_birth_date' =>   $request->member_birth_date,
                'member_email_address' =>  $request->email,
                'member_gender'     =>   $request->member_gender,
                'member_address'    =>   $request->member_address,
                'member_zip_code'   =>   $request->member_zip_code,
                'member_tax_reg_no' =>   $request->member_tax_reg_no,
                'member_personal_info_creating_datetime'        =>   date("Y-m-d"),
                'member_personal_info_editing_datetime'        =>   date("Y-m-d")
            );
    
            $job_data = array(
                'ref_member_job_info_membership_id' => $user->id,
                'member_command_code'      =>  $request->member_command_code,
                'member_command_name'      =>  $request->member_command_name,
                'member_rank'              =>   $request->member_rank,
                'member_shield'            =>   $request->member_shield,
                'member_appointment_date'  =>  $request->member_appointment_date,
                'member_promoted_date'     =>  $request->member_promoted_date,
                'member_boro'              =>  $request->member_boro,
                'member_benificiary'       => $request->member_benificiary,
                'member_reference_no'      => $request->member_reference_no,
                'member_retired'           => $request->member_retired, 
                'member_job_info_creating_datetime' =>   date("Y-m-d"),
                'member_job_info_editing_datetime'  =>   date("Y-m-d")
            );
    
            $payment_data = array(
                'ref_membership_id' => $user->id,
                'membership_payment_ess' =>   $request->membership_payment_ess,
                'membership_payment_amount' => 0,
                'membership_payment_datetime' => date("Y-m-d"),
                'membership_payment_creating_datetime'  =>   date("Y-m-d"),
                'membership_payment_editing_datetime'   =>   date("Y-m-d")
            );
            
            
            MemberPersonalInfo::create($personal_data);
            MemberJobInfo::create($job_data);
            MembershipPayment::create($payment_data);

            DB::commit();

            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            $success['name'] =  $user->name;
		    return response()->json(['success'=>true,'data'=>$success], $this-> successStatus); 

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['success'=>false,'error'=>$e], 401);            
        }
		
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