<?php

namespace App\Http\Controllers\api;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class EventsController extends Controller
{
	  public function index()
        {
            $results = Event::orderBy('id', 'desc')->get();
            //return response()->json(['success' => $results]);
			return response()->json([
            'success' => true,
            'data' => $results
        ]);
        }
        public function store(Request $request)
        {
			 $validator = Validator::make($request->all(), [ 
				'event_title' => 'required',
				'event_details' => 'required',
				'event_venue' => 'required',
				'event_ticket_price' => 'required',
				'event_total_seat' => 'required',
				'event_flyer_type' => 'required',
				'event_flyer_location' => 'required',
				'event_starting_date' => 'required',
				'event_ending_date' => 'required',
			]);
			
			if ($validator->fails()) { 
				return response()->json(['error'=>$validator->errors()], 401);            
			}
			$input = $request->all();  
			$input['active'] = 0; 
			$result = Event::create($input);
		 
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
            $result = Event::find($id); 
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
         $result = Event::find($id);			
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
           $result = Event::find($id);
 
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








