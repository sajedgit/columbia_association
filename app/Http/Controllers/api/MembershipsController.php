<?php

namespace App\Http\Controllers\api;
use App\Models\Membership;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

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


			$result->update($request->all());

			if ($result)
				return response()->json([
					'success' => true,
					'data' => $result
				]);
			else
				return response()->json([
					'success' => false,
					'message' => 'Item could not be updated'
				]);

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
}


