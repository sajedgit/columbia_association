<?php

namespace App\Http\Controllers\api;
use App\Models\Membership;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MembershipsController extends Controller
{
	  public function index()
        {
            $places = Membership::orderBy('id', 'desc')->get();
            return response()->json($places);
        }
        public function store(Request $request)
        {
            $place = Membership::create($request->all());
            return response()->json($place, 201);
        }
        public function show($id)
        {
            $place = Membership::findOrFail($id);
            return response()->json($place);
        }
        public function update(Request $request, $id)
        {
            $place = Membership::findOrFail($id);
            $place->update($request->all());
            return response()->json($place, 200);
        }
        public function destroy($id)
        {
            Membership::destroy($id);
            return response()->json(null, 204);
        }
}


