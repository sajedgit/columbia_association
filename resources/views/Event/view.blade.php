@extends('parent')

@section('main')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('events.page_title') }}</h1>
<p class="mb-4">{{ __('events.welcome_msg') }}</p>


 <div align="right">
  <a href="{{ route('events.index') }}" class="btn btn-default">Back</a>
 </div>
 <br />

 <table class="table table-striped">
        <thead >
        <tr class="info">

            <th scope="col">Column</th>
            <th scope="col">Value</th>
        </tr>
        </thead>
        <tbody>
		<tr>
			<td>{{ __('events.event_title') }}
 			<td>{{ $data->event_title }} </td>

		</tr>
		<tr>
			<td>{{ __('events.event_details') }}
 			<td>{{ $data->event_details }} </td>

		</tr>
		<tr>
			<td>{{ __('events.event_venue') }}
 			<td>{{ $data->event_venue }} </td>

		</tr>
		<tr>
			<td>{{ __('events.event_flyer_location') }}
            <td><img   src="{{ asset($data->event_flyer_location) }}"></td>

		</tr>
		<tr>
			<td>{{ __('events.event_flyer_type') }}
 			<td>{{ $data->event_flyer_type }} </td>

		</tr>
		<tr>
			<td>{{ __('events.event_starting_date') }}
 			<td>{{ $data->event_starting_date }} </td>

		</tr>
		<tr>
			<td>{{ __('events.event_starting_time') }}
 			<td>{{ $data->event_starting_time }} </td>

		</tr>

		<tr>
			<td>{{ __('events.event_ending_time') }}
 			<td>{{ $data->event_ending_time }} </td>

		</tr>
		<tr>
			<td>{{ __('events.event_ticket_price') }}
 			<td>{{ $data->event_ticket_price }} </td>

		</tr>
		<tr>
			<td>{{ __('events.event_total_seat') }}
 			<td>{{ $data->event_total_seat }} </td>

		</tr>
		<tr>
			<td>{{ __('events.event_active') }}
 			<td>{{ $data->event_active }} </td>

		</tr>

		</tbody>
</table>


@endsection
