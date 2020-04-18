<?php

namespace App\Http\Controllers\api;

use App\Models\BoardMembersCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class BoardMembersCategoriesController extends Controller
{
    public function index()
    {

        $results = BoardMembersCategory::with('details')->get();

        return response()->json([
            'success' => true,
            'data' => $results
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'board_members_category_name' => 'required',
            'board_members_category_position' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }
        $input = $request->all();
        $result = BoardMembersCategory::create($input);

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
        $result = BoardMembersCategory::find($id);
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
        $result = BoardMembersCategory::find($id);
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
        $result = BoardMembersCategory::find($id);

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






