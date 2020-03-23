@extends('parent')

@section('main')

<div class="jumbotron text-center">
 <div align="right">
  <a href="{{ route('membership_payments.index') }}" class="btn btn-default">Back</a>
 </div>
 <br />
 
 <h3>{{ __('membership_payments.ref_membership_id') }} - {{ $data->ref_membership_id }} </h3>
 <h3>{{ __('membership_payments.membership_payment_ess') }} - {{ $data->membership_payment_ess }} </h3>
 <h3>{{ __('membership_payments.membership_payment_by') }} - {{ $data->membership_payment_by }} </h3>
 <h3>{{ __('membership_payments.membership_payment_details') }} - {{ $data->membership_payment_details }} </h3>
 <h3>{{ __('membership_payments.membership_payment_datetime') }} - {{ $data->membership_payment_datetime }} </h3>
 <h3>{{ __('membership_payments.membership_payment_amount') }} - {{ $data->membership_payment_amount }} </h3>
 <h3>{{ __('membership_payments.membership_next_renewal_date') }} - {{ $data->membership_next_renewal_date }} </h3>
 <h3>{{ __('membership_payments.membership_payment_creating_datetime') }} - {{ $data->membership_payment_creating_datetime }} </h3>
 <h3>{{ __('membership_payments.membership_payment_editing_datetime') }} - {{ $data->membership_payment_editing_datetime }} </h3>
 

</div>
@endsection