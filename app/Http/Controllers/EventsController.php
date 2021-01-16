<?php

namespace App\Http\Controllers;

use App\Mail\CreateEventMail;
use App\Models\Event;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EventsController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin_middleware');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Event::orderBy('id', 'desc')->paginate(5);
        return view('Event/index', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status_items = $this->getStatusItem();
        return view('Event/create', compact('status_items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'event_title' => 'required',
                'event_venue' => 'required',
                'event_flyer_location' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'event_ticket_price' => 'required|numeric',
                'event_ticket_price_children' => 'required|numeric',
                'event_total_seat' => 'required|numeric'
            ],
            [
                'event_flyer_location.required' => 'The Flyer field is required',
                'event_flyer_location.image' => 'Flyer  must be an image',
                'event_flyer_location.mimes' => 'The Flyer must be a file of type: jpeg, png, jpg, gif.',
            ]
        );

        $image = $request->file('event_flyer_location');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $event_flyer_type = "image";

        $form_data = array(
            'event_title' => $request->event_title,
            'event_details' => $request->event_details,
            'event_venue' => $request->event_venue,
            'event_flyer_location' => $new_name,
            'event_flyer_type' => $event_flyer_type,
            'event_starting_date' => $request->event_starting_date,
            'event_starting_time' => $request->event_starting_time,
            'event_ending_date' => $request->event_ending_date,
            'event_ending_time' => $request->event_ending_time,
            'event_ticket_price' => $request->event_ticket_price,
            'event_ticket_price_children' => $request->event_ticket_price_children,
            'event_total_seat' => $request->event_total_seat,
            'event_created_datetime' => date('Y-m-d')
        );

        $create_events= Event::create($form_data);
        if($create_events->id)
        {
            $this->send_mail($form_data,"insert");

        }


        return redirect('events')->with('success', 'Data Added successfully.');
    }


    public function send_mail($data,$action)
    {

        if($action=="insert")
          $subject="New Event (".$data['event_title'].") has been created";
        else
            $subject=" Event (".$data['event_title'].") has been updated";

        $results = Membership::orderBy('id', 'desc')
            ->where("active",1)
            ->get();

        $cc = "sajedaiub@gmail.com";
        $bcc = "sajedaiub@gmail.com";
//        $cc = "sajedaiub@gmail.com";
//        $bcc = "sajedaiub@gmail.com";

        foreach ($results as $row)
        {
            $mail_to = $row->email;
           // $mail_to = "sajedaiub@gmail.com";
            $user_name = $row->name;
            Mail::to($mail_to)
                ->cc($cc)
                ->bcc($bcc)
                ->send(new CreateEventMail($data,$subject,$user_name));

            //sleep(1);
        }

    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Event::findOrFail($id);
        return view('Event/view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Event::findOrFail($id);
        $status_items = $this->getStatusItem();
        return view('Event/edit', compact('data', 'status_items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('event_flyer_location');
        $event_flyer_type = "image";
        if ($image != '') {
            $request->validate(
                [
                    'event_title' => 'required',
                    'event_venue' => 'required',
                    'event_flyer_location' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                    'event_ticket_price' => 'required|numeric',
                    'event_ticket_price_children' => 'required|numeric',
                    'event_total_seat' => 'required|numeric'
                ],
                [
                    'event_flyer_location.required' => 'The Flyer field is required',
                    'event_flyer_location.image' => 'Flyer  must be an image',
                    'event_flyer_location.mimes' => 'The Flyer must be a file of type: jpeg, png, jpg, gif.',
                ]
            );

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);

        } else {
            $request->validate([
                'event_title' => 'required',
                'event_venue' => 'required',
                'event_ticket_price' => 'required',
                'event_ticket_price_children' => 'required',
                'event_total_seat' => 'required'

            ]);
        }


        $form_data = array(
            'event_title' => $request->event_title,
            'event_details' => $request->event_details,
            'event_venue' => $request->event_venue,
            'event_flyer_location' => $image_name,
            'event_flyer_type' => $event_flyer_type,
            'event_starting_date' => $request->event_starting_date,
            'event_starting_time' => $request->event_starting_time,
            'event_ending_date' => $request->event_ending_date,
            'event_ending_time' => $request->event_ending_time,
            'event_ticket_price' => $request->event_ticket_price,
            'event_ticket_price_children' => $request->event_ticket_price_children,
            'event_total_seat' => $request->event_total_seat,
            'event_created_datetime' => date('Y-m-d')
        );

        $update_events=Event::whereId($id)->update($form_data);

        if($update_events)
        {
            $this->send_mail($form_data,"update");

        }

        return redirect('events')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Event::findOrFail($id);
        $data->delete();

        return redirect('events')->with('success', 'Data is successfully deleted');
    }

    public static function upcoming_events()
    {
        $upcoming_events = DB::select(DB::raw(" SELECT * from events where event_starting_date >= CURDATE() and event_active=1 order by event_starting_date asc   "));
        return $upcoming_events;
    }
}


