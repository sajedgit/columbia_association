<?php

namespace App\Http\Controllers\api;
use App\Models\BoardMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class BoardMembersController extends Controller
{
	  public function index()
        {
            $results = BoardMember::orderBy('id', 'desc')->get();
            //return response()->json(['success' => $results]);
			return response()->json([
            'success' => true,
            'data' => $results
        ]);
        }
        public function store(Request $request)
        {
			 $validator = Validator::make($request->all(), [ 
				'ref_board_members_category_id' => 'required',
				'board_members_first_name' => 'required',
				'board_members_last_name' => 'required',
				'board_member_designation' => 'required',
				'board_members_email_address' => 'required',
				'board_members_position' => 'required',
			]);
			
			if ($validator->fails()) { 
				return response()->json(['error'=>$validator->errors()], 401);            
			}
			$input = $request->all();  
			$result = BoardMember::create($input);
		 
			 if ($result)
				return response()->json([
					'success' => true,
					'data' => $result
				]);
			else
				return response()->json([
					'success' => false,
					'message' => 'Item could not be added'
				], 500);
				
            return response()->json($result, 201);
			
        }
        public function show($id)
        {
            $result = BoardMember::find($id); 
			if (!$result)
				{
					return response()->json([
						'success' => false,
						'message' => 'Item with id ' . $id . ' not found'
					], 400);
				}
 
			return response()->json([
				'success' => true,
				'data' => $result
			], 400);
		
        }
		
        public function update(Request $request, $id)
        {
         $result = BoardMember::find($id);			
			 if (!$result) 
			 {
				return response()->json([
				'success' => false,
				'message' => 'Item with id ' . $id . ' not found'
				], 400);
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
				], 500);
		
        }
		

		
        public function destroy($id)
        {
           $result = BoardMember::find($id);
 
			if (!$result) {
				return response()->json([
					'success' => false,
					'message' => 'Item with id ' . $id . ' not found'
				], 400);
			}
	 
			if ($result->delete()) {
				return response()->json([
					'success' => true
				]);
			} else {
				return response()->json([
					'success' => false,
					'message' => 'Item could not be deleted'
				], 500);
			}
        }
}








