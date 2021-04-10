<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\EssMember;
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
use Illuminate\Support\Facades\URL;

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
        $forgot_password_url=URL::to('password/reset');

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
        ],
        [
            'email.unique' => "You are already a register user in this system. If you forgot your password then you can recover this from $forgot_password_url or Please contact with site admin."
        ]

        );

        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->errors()], 401);
        }



        if( $request->membership_payment_ess===0)
        {

            DB::beginTransaction();

            try {

                $login_data = array(
                    'user_type_id'       => 2,
                    'ess_type'        =>   "Cash",
                    'ess_id'        =>   0,
                    'name'        =>   $request->name,
                    'username'        =>  $request->username,
                    'password'        =>    bcrypt($request->password),
                    'email'        =>    $request->email,
                    'photo'        =>   "no_image.jpg",
                    'active'        =>  1,
                    'created_at' => date("Y-m-d"),
                    'updated_at' => date("Y-m-d")

                );

                $user = Membership::create($login_data);

                $personal_data = array(
                    'ref_member_personal_info_membership_id' => $user->id,
                    'member_first_name' => $request->member_first_name,
                    'member_last_name' => $request->member_last_name,
                    'member_birth_date' => $request->member_birth_date,
                    'member_email_address' => $request->email,
                    'member_gender' => $request->member_gender,
                    'member_address' => $request->member_address,
                    'member_zip_code' => $request->member_zip_code,
                    'member_tax_reg_no' => $request->member_tax_reg_no,
                    'member_personal_info_creating_datetime' => date("Y-m-d"),
                    'member_personal_info_editing_datetime' => date("Y-m-d")
                );

                $job_data = array(
                    'ref_member_job_info_membership_id' => $user->id,
                    'member_command_code' => $request->member_command_code,
                    'member_command_name' => $request->member_command_name,
                    'member_rank' => $request->member_rank,
                    'member_shield' => $request->member_shield,
                    'member_appointment_date' => $request->member_appointment_date,
                    'member_promoted_date' => $request->member_promoted_date,
                    'member_boro' => $request->member_boro,
                    'member_benificiary' => $request->member_benificiary,
                    'member_reference_no' => $request->member_reference_no,
                    'member_retired' => $request->member_retired,
                    'member_job_info_creating_datetime' => date("Y-m-d"),
                    'member_job_info_editing_datetime' => date("Y-m-d")
                );

                $payment_data = array(
                    'ref_membership_id' => $user->id,
                    'membership_payment_ess' => $request->membership_payment_ess,
                    'membership_payment_amount' => 0,
                    'membership_payment_datetime' => date("Y-m-d"),
                    'membership_payment_creating_datetime' => date("Y-m-d"),
                    'membership_payment_editing_datetime' => date("Y-m-d")
                );


                MemberPersonalInfo::create($personal_data);
                MemberJobInfo::create($job_data);
                MembershipPayment::create($payment_data);

                DB::commit();
                //  $this->membershipPayment($user->id);

                $success['token'] =  $user->createToken('MyApp')-> accessToken;
                $success['name'] =  $user->name;
                return response()->json(['success'=>true,'data'=>$success], $this-> successStatus);

            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['success'=>false,'error'=>$e], 401);
            }
        }
        else
        {
            DB::beginTransaction();

            try {


                $ess_data = array(
                    'type'       =>  "Cash",
                    'name'        =>   $request->name,
                    'email'        =>   $request->email,
                    'created_at' => date('Y-m-d H:i:s'),
                    'active'        =>   1,

                );

                $create_ess_member=EssMember::create($ess_data);

                $login_data = array(
                    'user_type_id'       => 2,
                    'ess_type'        =>   "Cash",
                    'ess_id'        =>   $create_ess_member->id,
                    'name'        =>   $request->name,
                    'username'        =>  $request->username,
                    'password'        =>    bcrypt($request->password),
                    'email'        =>    $request->email,
                    'photo'        =>   "no_image.jpg",
                    'active'        =>  1,
                    'created_at' => date("Y-m-d"),
                    'updated_at' => date("Y-m-d")

                );

                $user = Membership::create($login_data);

                $personal_data = array(
                    'ref_member_personal_info_membership_id' => $user->id,
                    'member_first_name' => $request->member_first_name,
                    'member_last_name' => $request->member_last_name,
                    'member_birth_date' => $request->member_birth_date,
                    'member_email_address' => $request->email,
                    'member_gender' => $request->member_gender,
                    'member_address' => $request->member_address,
                    'member_zip_code' => $request->member_zip_code,
                    'member_tax_reg_no' => $request->member_tax_reg_no,
                    'member_personal_info_creating_datetime' => date("Y-m-d"),
                    'member_personal_info_editing_datetime' => date("Y-m-d")
                );

                $job_data = array(
                    'ref_member_job_info_membership_id' => $user->id,
                    'member_command_code' => $request->member_command_code,
                    'member_command_name' => $request->member_command_name,
                    'member_rank' => $request->member_rank,
                    'member_shield' => $request->member_shield,
                    'member_appointment_date' => $request->member_appointment_date,
                    'member_promoted_date' => $request->member_promoted_date,
                    'member_boro' => $request->member_boro,
                    'member_benificiary' => $request->member_benificiary,
                    'member_reference_no' => $request->member_reference_no,
                    'member_retired' => $request->member_retired,
                    'member_job_info_creating_datetime' => date("Y-m-d"),
                    'member_job_info_editing_datetime' => date("Y-m-d")
                );

                $payment_data = array(
                    'ref_membership_id' => $user->id,
                    'membership_payment_ess' => $request->membership_payment_ess,
                    'membership_payment_amount' => 0,
                    'membership_payment_datetime' => date("Y-m-d"),
                    'membership_payment_creating_datetime' => date("Y-m-d"),
                    'membership_payment_editing_datetime' => date("Y-m-d")
                );


                MemberPersonalInfo::create($personal_data);
                MemberJobInfo::create($job_data);
                MembershipPayment::create($payment_data);

                DB::commit();
                //  $this->membershipPayment($user->id);

                $success['token'] =  $user->createToken('MyApp')-> accessToken;
                $success['name'] =  $user->name;
                return response()->json(['success'=>true,'data'=>$success], $this-> successStatus);

            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['success'=>false,'error'=>$e], 401);
            }
        }




    }


    public function membershipPayment($user_id)
    {
        $quantity = 1;

        if (empty($user_id)) {
            return view('404');
        }

        $action = "buyMembership";


        $item_name = "Buy Membership";
        $item_description = "Buy Membership for One Year";
        $price = 10;

        $details = $user_id . "_" . $action;

        //$this->processPayment($user_id,$product_id,$product_name,$product_description,$price,$quantity,$action);

        return view('membership_payment', compact('user_id', 'item_name', 'item_description', 'price', 'quantity', 'action', 'details'));
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
            'password' => $request->password,
        ];


        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->active==0)
                return response()->json(['success' => false, 'error' => 'You are deactive by admin for some reason. Please contact with site admin']);

//            if ($user->ess_type !== "Online Payment" || $user->ess_type !== "Paid")
//                return response()->json(['success' => false, 'error' => 'Your are not paid user or your subscription have to be renew. Please contact with site admin']);


            $member_devices = MemberDevice::create([
                'ref_member_device_membership_id' => $user->id,
                'member_device_os_type' => $request->member_device_os_type,
                'member_device_token_id' => $user->createToken('MyApp')->accessToken,
                'member_device_unique_id' => $request->member_device_unique_id

            ]);

            $success['user_email'] = $user->email;
            $success['user_id'] = $user->id;
            $success['ess_type'] = $user->ess_type;
            $success['ess_id'] = $user->ess_id;
            $success['active'] = $user->active;
            $success['token'] = $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => true, 'user_id' => $user->id, 'data' => $success], $this->successStatus);
        } else {
            return response()->json(['success' => false, 'error' => 'Unauthorised access'], 401);
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
        return response()->json(['success' => true, 'data' => $user], $this->successStatus);
    }


}