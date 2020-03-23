@extends('parent')

@section('main')

<div class="jumbotron text-center">
 <div align="right">
  <a href="{{ route('events.index') }}" class="btn btn-default">Back</a>
 </div>
 <br />
 
 <h3>{{ __('events.event_title') }} - {{ $data->event_title }} </h3>
 <h3>{{ __('events.event_details') }} - {{ $data->event_details }} </h3>
 <h3>{{ __('events.event_venue') }} - {{ $data->event_venue }} </h3>
 <h3>{{ __('events.event_flyer_location') }} - {{ $data->event_flyer_location }} </h3>
 <h3>{{ __('events.event_flyer_type') }} - {{ $data->event_flyer_type }} </h3>
 <h3>{{ __('events.event_starting_date') }} - {{ $data->event_starting_date }} </h3>
 <h3>{{ __('events.event_starting_time') }} - {{ $data->event_starting_time }} </h3>
 <h3>{{ __('events.event_ending_date') }} - {{ $data->event_ending_date }} </h3>
 <h3>{{ __('events.event_ending_time') }} - {{ $data->event_ending_time }} </h3>
 <h3>{{ __('events.event_ticket_price') }} - {{ $data->event_ticket_price }} </h3>
 <h3>{{ __('events.event_total_seat') }} - {{ $data->event_total_seat }} </h3>
 <h3>{{ __('events.event_active') }} - {{ $data->event_active }} </h3>
 <h3>{{ __('events.event_created_datetime') }} - {{ $data->event_created_datetime }} </h3>
 <h3>{{ __('events.event_edited_datetime') }} - {{ $data->event_edited_datetime }} </h3>
 

</div>
@endsection