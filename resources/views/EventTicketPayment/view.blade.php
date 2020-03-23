@extends('parent')

@section('main')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('event_ticket_payments.page_title') }}</h1>
<p class="mb-4">{{ __('event_ticket_payments.welcome_msg') }}</p>


 <div align="right">
  <a href="{{ route('event_ticket_payments.index') }}" class="btn btn-default">Back</a>
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
			<td>{{ __('event_ticket_payments.ref_event_id') }}
 			<td>{{ $data->ref_event_id }} </td>
 
		</tr>
		<tr>
			<td>{{ __('event_ticket_payments.event_ticket_payment_by') }}
 			<td>{{ $data->event_ticket_payment_by }} </td>
 
		</tr>
		<tr>
			<td>{{ __('event_ticket_payments.event_ticket_payment_details') }}
 			<td>{{ $data->event_ticket_payment_details }} </td>
 
		</tr>
		<tr>
			<td>{{ __('event_ticket_payments.event_ticket_payment_datetime') }}
 			<td>{{ $data->event_ticket_payment_datetime }} </td>
 
		</tr>
		<tr>
			<td>{{ __('event_ticket_payments.event_ticket_payment_amount') }}
 			<td>{{ $data->event_ticket_payment_amount }} </td>
 
		</tr>
		<tr>
			<td>{{ __('event_ticket_payments.event_ticket_payment_creating_datetime') }}
 			<td>{{ $data->event_ticket_payment_creating_datetime }} </td>
 
		</tr>
		<tr>
			<td>{{ __('event_ticket_payments.event_ticket_payment_editing_datetime') }}
 			<td>{{ $data->event_ticket_payment_editing_datetime }} </td>
 
		</tr>
		</tbody>
</table>


@endsection