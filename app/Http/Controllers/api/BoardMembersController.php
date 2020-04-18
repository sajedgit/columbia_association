<?php

namespace App\Http\Controllers\api;
use App\Models\BoardMember;
use App\Models\BoardMembersCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\DB;


class BoardMembersController extends Controller
{
	  public function index()
        {
                $results = BoardMember::orderBy('id', 'desc')->get();
                return response()->json(['success' => $results]);


//            $results = BoardMember::orderBy('id', 'desc')->get();
//            $collection = collect($results);
//            $grouped = $collection->groupBy('ref_board_members_category_id');
//            return response()->json(['success' => $grouped]);


//            $results = DB::table('board_members')
//                ->join('board_members_categories', 'board_members.ref_board_members_category_id', '=', 'board_members_categories.id')
//                ->select('board_members.*','board_members_categories.board_members_category_name as category')
//                ->get()
//                ->groupBy(function ($item) {
//                    return $item->category;
//                });
//
//                return response()->json([
//                'success' => true,
//                'data' => $results
//            ]);


//          $results = DB::table('board_members_categories')
//              ->join('board_members', 'board_members_categories.id', '=', 'board_members.ref_board_members_category_id')
//              ->select('board_members_categories.id as category_id','board_members_categories.*','board_members.*')
//              ->get()
//              ->groupBy(function ($item) {
//                  return $item->category_id;
//              });


//          $results = DB::table('board_members_categories')
//              ->join('board_members', 'board_members_categories.id', '=', 'board_members.ref_board_members_category_id')
//              ->select('board_members_categories.id as category_id','board_members_categories.*','board_members.*')
//              ->get();
//          $collection = collect($results);
//          $grouped = $collection->groupBy('category_id');
//          return response()->json(['success' => $grouped]);

//          return response()->json([
//              'success' => true,
//              'data' => $results
//          ]);


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
				]);

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
					]);
				}

			return response()->json([
				'success' => true,
				'data' => $result
			]);

        }

        public function update(Request $request, $id)
        {
         $result = BoardMember::find($id);
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
           $result = BoardMember::find($id);

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








