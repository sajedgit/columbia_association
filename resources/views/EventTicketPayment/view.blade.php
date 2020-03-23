@extends('parent')

@section('main')

<div class="jumbotron text-center">
 <div align="right">
  <a href="{{ route('event_ticket_payments.index') }}" class="btn btn-default">Back</a>
 </div>
 <br />
 
 <h3>{{ __('event_ticket_payments.ref_event_id') }} - {{ $data->ref_event_id }} </h3>
 <h3>{{ __('event_ticket_payments.event_ticket_payment_by') }} - {{ $data->event_ticket_payment_by }} </h3>
 <h3>{{ __('event_ticket_payments.event_ticket_payment_details') }} - {{ $data->event_ticket_payment_details }} </h3>
 <h3>{{ __('event_ticket_payments.event_ticket_payment_datetime') }} - {{ $data->event_ticket_payment_datetime }} </h3>
 <h3>{{ __('event_ticket_payments.event_ticket_payment_amount') }} - {{ $data->event_ticket_payment_amount }} </h3>
 <h3>{{ __('event_ticket_payments.event_ticket_payment_creating_datetime') }} - {{ $data->event_ticket_payment_creating_datetime }} </h3>
 <h3>{{ __('event_ticket_payments.event_ticket_payment_editing_datetime') }} - {{ $data->event_ticket_payment_editing_datetime }} </h3>
 

</div>
@endsection