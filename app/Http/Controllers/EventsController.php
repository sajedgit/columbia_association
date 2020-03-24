<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
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
        return view('Event/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_title'    =>  'required',
            'event_venue'     =>  'required',
            'event_flyer_location'    =>  'required',
            'event_flyer_type'     =>  'required',
//            'event_starting_date'    =>  'required',
//            'event_starting_time'     =>  'required',
//            'event_ending_date'    =>  'required',
//            'event_ending_time'     =>  'required',
            'event_ticket_price'    =>  'required',
            'event_total_seat'     =>  'required'

        ]);


        $form_data = array(
            'event_title'       =>   $request->event_title,
            'event_details'       =>   $request->event_details,
            'event_venue'        =>   $request->event_venue,
            'event_flyer_location'        =>   $request->event_flyer_location,
            'event_flyer_type'        =>   $request->event_flyer_type,
            'event_starting_date'        =>   $request->event_starting_date,
            'event_starting_time'        =>   $request->event_starting_time,
            'event_ending_date'        =>   $request->event_ending_date,
            'event_ending_time'        =>   $request->event_ending_time,
            'event_ticket_price'        =>   $request->event_ticket_price,
            'event_total_seat'        =>   $request->event_total_seat,
            'event_created_datetime'        =>   date('Y-m-d')
        );

        Event::create($form_data);

        return redirect('events')->with('success', 'Data Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Event::findOrFail($id);
        return view('Event/edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'event_title'    =>  'required',
            'event_venue'     =>  'required',
            'event_flyer_location'    =>  'required',
            'event_flyer_type'     =>  'required',
//            'event_starting_date'    =>  'required',
//            'event_starting_time'     =>  'required',
//            'event_ending_date'    =>  'required',
//            'event_ending_time'     =>  'required',
            'event_ticket_price'    =>  'required',
            'event_total_seat'     =>  'required'

        ]);


        $form_data = array(
            'event_title'       =>   $request->event_title,
            'event_details'       =>   $request->event_details,
            'event_venue'        =>   $request->event_venue,
            'event_flyer_location'        =>   $request->event_flyer_location,
            'event_flyer_type'        =>   $request->event_flyer_type,
            'event_starting_date'        =>   $request->event_starting_date,
            'event_starting_time'        =>   $request->event_starting_time,
            'event_ending_date'        =>   $request->event_ending_date,
            'event_ending_time'        =>   $request->event_ending_time,
            'event_ticket_price'        =>   $request->event_ticket_price,
            'event_total_seat'        =>   $request->event_total_seat,
            'event_created_datetime'        =>   date('Y-m-d')
        );

        Event::whereId($id)->update($form_data);

        return redirect('events')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Event::findOrFail($id);
        $data->delete();

        return redirect('Event/index')->with('success', 'Data is successfully deleted');
    }
}


