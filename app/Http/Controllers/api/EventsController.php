<?php

namespace App\Http\Controllers\api;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\Mail\SendEventMail;

class EventsController extends Controller
{
    public function index()
    {
//        $results = Event::orderBy('id', 'desc')->get();
//        $collection = collect($results);
//        $results = $collection->groupBy('event_starting_date');

        $results = Event::with('event_ticket_buyers','event_ticket_payments')
            ->orderBy('id', 'desc')
            ->get();

       // $collection = collect($results);
       // $results = $collection->groupBy('event_starting_date');

        return response()->json([
            'success' => true,
            'data' => $results
        ]);
    }

    public function store(Request $request)
    {

//        $validator = Validator::make($request->all(), [
//            'event_title' => 'required',
//            'event_details' => 'required',
//            'event_venue' => 'required',
//            'event_ticket_price' => 'required',
//            'event_total_seat' => 'required',
//            'event_flyer_type' => 'required',
//            'event_flyer_location' => 'required',
//            'event_starting_date' => 'required',
//            'event_ending_date' => 'required',
//        ]);
//
//        if ($validator->fails()) {
//            return response()->json(['error' => $validator->errors()]);
//        }
//        $input = $request->all();
//        $input['active'] = 0;
//        $input['event_created_datetime'] = date("Y-m-d");
//        $result = Event::create($input);
//
//        if ($result)
//            return response()->json([
//                'success' => true,
//                'data' => $result
//            ]);
//        else
//            return response()->json([
//                'success' => false,
//                'message' => 'Item could not be added'
//            ]);
//
//        return response()->json($result, 201);

    }

    public function show($id)
    {
        $result = Event::find($id);
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
        $event_id=$id;
        $member_id=$request->member_id;
        $order_id=$request->order_id;
        $source=$request->source;
        $payment_type=$request->payment_type;
        $details=$request->details;
        $total_tickets=$request->total_tickets;
        $total_price=$request->total_price;
        $buyer_first_name=$request->buyer_first_name;
        $buyer_last_name=$request->buyer_last_name;

        if(empty($event_id) || empty($member_id) || empty($order_id) || empty($source) || empty($payment_type) || empty($details)  || empty($total_tickets)  || empty($total_price) )
        {

            return response()->json([
                'success' => false,
                'message' => "Please provide these field: 'event_id, member_id, order_id, source, payment_type, details, total_tickets,total_price' "
            ]);
        }

        $payment_insert = DB::table('event_ticket_buyers')->insert(
            array(
                'ref_event_id' => $event_id,
                'ref_membership_id' => $member_id,
                'order_id' => $order_id,
                'source' => $source,
                'buyer_first_name' => $buyer_first_name,
                'buyer_last_name' => $buyer_last_name,
                'payment_type' => $payment_type,
                'details' => $details,
                'total_tickets' => $total_tickets,
                'total_price' => $total_price,
                'event_ticket_buyer_stored_datetime' => NOW()
            )
        );


        if ($payment_insert)
        {
            $this->update_event_data($event_id, $total_tickets);
            $this->send_mail_event($event_id, $member_id, $order_id, $source, $payment_type, $details, $total_tickets, $total_price);
            $rest_data = Event::where('id', $event_id)->first();
            $rest_data->event_flyer_location = url('/')."/public/images/".$rest_data->event_flyer_location;
            return response()->json([
                'success' => true,
                'message' => "Buy Event Ticket Successfully",
                'data' => $rest_data
            ]);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => "Payment not done Properly"
            ]);
        }

    }


    public function update_event_data($event_id, $total_tickets)
    {
        $product_data = Event::findOrFail($event_id);
        $stock = $product_data->event_total_seat;
        $stock_update = $stock - $total_tickets;
        $form_data = array(
            'event_total_seat' => $stock_update,
        );


        Event::whereId($event_id)->update($form_data);
    }


    public function send_mail_event($event_id, $ref_membership_id, $order_id, $source, $payment_type, $details, $total_tickets, $net_amounts)
    {
        $event = DB::select(DB::raw(" SELECT * from events where  id=$event_id  "));
        $event = $event[0];
        $event_name = $event->event_title;
        $action = "Tickets";


        $user = DB::select(DB::raw(" SELECT * from memberships where  id=$ref_membership_id  "));
        $user = $user[0];
        $user_name = $user->name;
        $user_email = $user->email;
        $subject = "Buying Event Ticket Confirmation";
        $mail_to = $user_email;
        $cc = "sajedaiub@gmail.com";
        $bcc = "sajedaiub@gmail.com";


        Mail::to($mail_to)
            ->cc($cc)
            ->bcc($bcc)
            ->send(new SendEventMail($action, $event_name, $subject, $user_name, $order_id, $source, $payment_type, $details, $total_tickets, $net_amounts));

    }





    public function destroy($id)
    {
        $result = Event::find($id);

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








