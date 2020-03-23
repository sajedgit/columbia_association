@extends('parent')

@section('main')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('contact_us.page_title') }}</h1>
<p class="mb-4">{{ __('contact_us.welcome_msg') }}</p>


 <div align="right">
  <a href="{{ route('contact_us.index') }}" class="btn btn-default">Back</a>
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
			<td>{{ __('contact_us.ref_membership_id') }}
 			<td>{{ $data->ref_membership_id }} </td>
 
		</tr>
		<tr>
			<td>{{ __('contact_us.contact_us_subject') }}
 			<td>{{ $data->contact_us_subject }} </td>
 
		</tr>
		<tr>
			<td>{{ __('contact_us.contact_us_details') }}
 			<td>{{ $data->contact_us_details }} </td>
 
		</tr>
		<tr>
			<td>{{ __('contact_us.contact_us_seen') }}
 			<td>{{ $data->contact_us_seen }} </td>
 
		</tr>
		<tr>
			<td>{{ __('contact_us.contact_us_created_date_time') }}
 			<td>{{ $data->contact_us_created_date_time }} </td>
 
		</tr>
		</tbody>
</table>


@endsection