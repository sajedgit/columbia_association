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
//        $results = BoardMember::orderBy('id', 'desc')->get();
////
////        return response()->json([
////            'success' => true,
////            'data' => $results
////        ]);

        $results = BoardMembersCategory::with('details')->get();

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
            return response()->json(['error' => $validator->errors()], 401);
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
        if (!$result) {
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
        if (!$result) {
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








