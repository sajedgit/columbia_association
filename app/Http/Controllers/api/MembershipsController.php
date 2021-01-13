<?php

namespace App\Http\Controllers\api;
use App\Models\MemberJobInfo;
use App\Models\MemberPersonalInfo;
use App\Models\Membership;
use App\Models\MembershipPayment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\DB;

class MembershipsController extends Controller
{
	  public function index()
        {
          $results = Membership::with('member_personal_infos','member_job_infos','membership_payments','member_devices')
              ->where('user_type_id', '<>',1)
              ->orderBy('id', 'desc')
              ->get();
			return response()->json([
            'success' => true,
            'data' => $results
        ]);
        }
        public function store(Request $request)
        {
			 $validator = Validator::make($request->all(), [
				'name' => 'required|min:3',
				'username' => 'required|min:6|unique:memberships',
				'email' => 'required|email|unique:memberships',
				'password' => 'required|min:6',
			]);

			if ($validator->fails()) {
				return response()->json(['error'=>$validator->errors()]);
			}
			$input = $request->all();
			$input['password'] = bcrypt($input['password']);
			$input['user_type_id'] = 2;
			$input['active'] = 0;
			$result = Membership::create($input);

			 if ($result)
				return response()->json([
					'success' => true,
					'data' => $result
				]);
			else
				return response()->json([
					'success' => false,
					'message' => 'Item could not be added'
				]);

            return response()->json($result, 201);

        }
        public function show($id)
        {
           // $result = Membership::find($id);

            $result = Membership::with('member_personal_infos','member_job_infos','membership_payments','member_devices')
                ->where('id',$id)
                ->orderBy('id', 'desc')
                ->get();

			if (!$result)
				{
					return response()->json([
						'success' => false,
						'message' => 'Item with id ' . $id . ' not found'
					]);
				}

			return response()->json([
				'success' => true,
				'data' => $result
			]);

        }

        public function update(Request $request, $id)
        {
         $result = Membership::find($id);
			 if (!$result)
			 {
				return response()->json([
				'success' => false,
				'message' => 'Item with id ' . $id . ' not found'
				]);
			 }


//			$result->update($request->all());
//
//			if ($result)
//				return response()->json([
//					'success' => true,
//					'data' => $result
//				]);
//			else
//				return response()->json([
//					'success' => false,
//					'message' => 'Item could not be updated'
//				]);

            $validator = Validator::make($request->all(), [
                'name' => 'min:3',
                'password' => 'min:6',
                'member_birth_date' => 'date',
                'member_appointment_date' => 'date',
                'member_promoted_date' => 'date',

            ]);

            if ($validator->fails()) {

                return response()->json(['success'=>false,'error'=>$validator->errors()], 401);
            }

            DB::beginTransaction();

            try {

                $login_data = array(
                    'name'            =>   $request->name,
                  //  'username'        =>   $request->username,
                    'password'        =>   bcrypt($request->password),
                 //   'email'           =>   $request->email,
                    'user_type_id'    =>   2,
                    'active'          =>   1,
                    'updated_at'      =>   date("Y-m-d")
                );

               // Membership::whereId($id)->update($request->all());
                $result->update($request->all());

                $personal_data = array(
                    'ref_member_personal_info_membership_id' => $id,
                    'member_first_name' =>   $request->member_first_name,
                    'member_last_name'  =>   $request->member_last_name,
                    'member_birth_date' =>   $request->member_birth_date,
                    'member_email_address' =>  $request->member_email_address,
                    'member_gender'     =>   $request->member_gender,
                    'member_address'    =>   $request->member_address,
                    'member_zip_code'   =>   $request->member_zip_code,
                    'member_tax_reg_no' =>   $request->member_tax_reg_no,
                    'member_personal_info_creating_datetime'        =>   date("Y-m-d"),
                    'member_personal_info_editing_datetime'        =>   date("Y-m-d")
                );

                $job_data = array(
                    'ref_member_job_info_membership_id' => $id,
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
                    'ref_membership_id' => $id,
                    'membership_payment_ess' =>   $request->membership_payment_ess,
                    'membership_payment_by' =>   $request->membership_payment_by,
                    'membership_payment_details' =>   $request->membership_payment_details,
                    'membership_payment_amount' =>   $request->membership_payment_amount,
                    'membership_next_renewal_date' =>   $request->membership_next_renewal_date,
                    'membership_payment_datetime' => date("Y-m-d"),
                    'membership_payment_creating_datetime'  =>   date("Y-m-d"),
                    'membership_payment_editing_datetime'   =>   date("Y-m-d")
                );


               // $result = MemberPersonalInfo::find($id);

              //  MemberPersonalInfo::where('ref_member_personal_info_membership_id', $id)->update($request->all());
              //  MemberJobInfo::where('ref_member_job_info_membership_id', $id)->update($request->all());
              //  MembershipPayment::where('ref_membership_id', $id)->update($request->all());

                $user_personal_infos = DB::select(DB::raw(" SELECT * from member_personal_infos where  ref_member_personal_info_membership_id=$id  "));
                if(count($user_personal_infos))
                    MemberPersonalInfo::where("ref_member_personal_info_membership_id",$id)->update($personal_data);
                else
                    MemberPersonalInfo::create($personal_data);


                $user_job_infos = DB::select(DB::raw(" SELECT * from member_job_infos where  ref_member_job_info_membership_id=$id  "));
                if(count($user_job_infos))
                    MemberJobInfo::where("ref_member_job_info_membership_id",$id)->update($job_data);
                else
                    MemberJobInfo::create($job_data);



                $membership_payments_infos = DB::select(DB::raw(" SELECT * from membership_payments where  ref_membership_id=$id  "));
                if(count($membership_payments_infos))
                    MembershipPayment::where("ref_membership_id",$id)->update($payment_data);
                else
                    MembershipPayment::create($payment_data);




                DB::commit();


                return response()->json([
                    'success' => true,
                    'message' => 'Item with id ' . $id . ' update successfully',
                    'data' => $this->get_member_details_by_id($id)

                ]);

            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['success'=>false,'error'=>$e], 401);
            }




        }



        public function destroy($id)
        {
           $result = Membership::find($id);

			if (!$result) {
				return response()->json([
					'success' => false,
					'message' => 'Item with id ' . $id . ' not found'
				]);
			}

			if ($result->delete()) {
				return response()->json([
					'success' => true
				]);
			} else {
				return response()->json([
					'success' => false,
					'message' => 'Item could not be deleted'
				]);
			}
        }





        public function get_member_details_by_id($id)
        {
            $result = Membership::with('member_personal_infos','member_job_infos','membership_payments','member_devices')
                ->where('id',$id)
                ->orderBy('id', 'desc')
                ->get();


            return $result;
        }



}


