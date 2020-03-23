@extends('parent')

@section('main')

<div class="jumbotron text-center">
 <div align="right">
  <a href="{{ route('event_ticket_buyers.index') }}" class="btn btn-default">Back</a>
 </div>
 <br />
 
 <h3>{{ __('event_ticket_buyers.ref_event_id') }} - {{ $data->ref_event_id }} </h3>
 <h3>{{ __('event_ticket_buyers.ref_membership_id') }} - {{ $data->ref_membership_id }} </h3>
 <h3>{{ __('event_ticket_buyers.buyer_first_name') }} - {{ $data->buyer_first_name }} </h3>
 <h3>{{ __('event_ticket_buyers.buyer_last_name') }} - {{ $data->buyer_last_name }} </h3>
 <h3>{{ __('event_ticket_buyers.payment_type') }} - {{ $data->payment_type }} </h3>
 <h3>{{ __('event_ticket_buyers.total_tickets') }} - {{ $data->total_tickets }} </h3>
 <h3>{{ __('event_ticket_buyers.total_price') }} - {{ $data->total_price }} </h3>
 <h3>{{ __('event_ticket_buyers.event_ticket_buyer_stored_datetime') }} - {{ $data->event_ticket_buyer_stored_datetime }} </h3>
 <h3>{{ __('event_ticket_buyers.event_ticket_buyer_edited_datetime') }} - {{ $data->event_ticket_buyer_edited_datetime }} </h3>
 

</div>
@endsection