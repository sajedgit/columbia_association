@extends('parent')

@section('main')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('event_ticket_buyers.page_title') }}</h1>
<p class="mb-4">{{ __('event_ticket_buyers.welcome_msg') }}</p>


 <div align="right">
  <a href="{{ route('event_ticket_buyers.index') }}" class="btn btn-default">Back</a>
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
			<td>{{ __('event_ticket_buyers.ref_event_id') }}
 			<td>{{ $data->ref_event_id }} </td>
 
		</tr>
		<tr>
			<td>{{ __('event_ticket_buyers.ref_membership_id') }}
 			<td>{{ $data->ref_membership_id }} </td>
 
		</tr>
		<tr>
			<td>{{ __('event_ticket_buyers.buyer_first_name') }}
 			<td>{{ $data->buyer_first_name }} </td>
 
		</tr>
		<tr>
			<td>{{ __('event_ticket_buyers.buyer_last_name') }}
 			<td>{{ $data->buyer_last_name }} </td>
 
		</tr>
		<tr>
			<td>{{ __('event_ticket_buyers.payment_type') }}
 			<td>{{ $data->payment_type }} </td>
 
		</tr>
		<tr>
			<td>{{ __('event_ticket_buyers.total_tickets') }}
 			<td>{{ $data->total_tickets }} </td>
 
		</tr>
		<tr>
			<td>{{ __('event_ticket_buyers.total_price') }}
 			<td>{{ $data->total_price }} </td>
 
		</tr>
		<tr>
			<td>{{ __('event_ticket_buyers.event_ticket_buyer_stored_datetime') }}
 			<td>{{ $data->event_ticket_buyer_stored_datetime }} </td>
 
		</tr>
		<tr>
			<td>{{ __('event_ticket_buyers.event_ticket_buyer_edited_datetime') }}
 			<td>{{ $data->event_ticket_buyer_edited_datetime }} </td>
 
		</tr>
		</tbody>
</table>


@endsection