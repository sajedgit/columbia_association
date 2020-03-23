@extends('parent')

@section('main')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('membership_payments.page_title') }}</h1>
<p class="mb-4">{{ __('membership_payments.welcome_msg') }}</p>


 <div align="right">
  <a href="{{ route('membership_payments.index') }}" class="btn btn-default">Back</a>
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
			<td>{{ __('membership_payments.ref_membership_id') }}
 			<td>{{ $data->ref_membership_id }} </td>
 
		</tr>
		<tr>
			<td>{{ __('membership_payments.membership_payment_ess') }}
 			<td>{{ $data->membership_payment_ess }} </td>
 
		</tr>
		<tr>
			<td>{{ __('membership_payments.membership_payment_by') }}
 			<td>{{ $data->membership_payment_by }} </td>
 
		</tr>
		<tr>
			<td>{{ __('membership_payments.membership_payment_details') }}
 			<td>{{ $data->membership_payment_details }} </td>
 
		</tr>
		<tr>
			<td>{{ __('membership_payments.membership_payment_datetime') }}
 			<td>{{ $data->membership_payment_datetime }} </td>
 
		</tr>
		<tr>
			<td>{{ __('membership_payments.membership_payment_amount') }}
 			<td>{{ $data->membership_payment_amount }} </td>
 
		</tr>
		<tr>
			<td>{{ __('membership_payments.membership_next_renewal_date') }}
 			<td>{{ $data->membership_next_renewal_date }} </td>
 
		</tr>
		<tr>
			<td>{{ __('membership_payments.membership_payment_creating_datetime') }}
 			<td>{{ $data->membership_payment_creating_datetime }} </td>
 
		</tr>
		<tr>
			<td>{{ __('membership_payments.membership_payment_editing_datetime') }}
 			<td>{{ $data->membership_payment_editing_datetime }} </td>
 
		</tr>
		</tbody>
</table>


@endsection