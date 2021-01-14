<?php
$event_starting_date=$data['event_starting_date'];
$event_starting_time=$data['event_starting_time'];
$event_ending_date=$data['event_ending_date'];
$event_ending_time=$data['event_ending_time'];

$start_date_time=strtotime("$event_starting_date $event_starting_time");
$start_datetime_formate= date("F j, Y, g:i a", $start_date_time);

$end_date_time=strtotime("$event_ending_date $event_ending_time");
$end_datetime_formate= date("F j, Y, g:i a", $end_date_time);

$final_formated_date=$start_datetime_formate." - ". $end_datetime_formate;

?>

<div>
    <p>Hi Mr/Mrs {{ $user_name }},<br/> {{ $subject }}</p>
    <p>Event Name: {{ $data['event_title']  }}</p>
    <p>Event Details: {{ $data['event_details'] }}</p>
    <p>Event Photo:  <img class="img-responsive" src="{{ URL::to('/') }}/public/images/{{ $data['event_flyer_location'] }}"></p>
    <p>Venue:  {{ $data['event_venue'] }}</p>
    <p>Event Date: {{ $final_formated_date }}</p>
    <p>Ticket Price: {{ $data['event_ticket_price'] }}</p>
    <p>Ticket Price(Children): {{ $data['event_ticket_price_children'] }}</p>
    <p>Total Seat: {{ $data['event_total_seat'] }}</p>

</div>

