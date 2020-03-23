@extends('parent')

@section('main')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('member_devices.page_title') }}</h1>
<p class="mb-4">{{ __('member_devices.welcome_msg') }}</p>


 <div align="right">
  <a href="{{ route('member_devices.index') }}" class="btn btn-default">Back</a>
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
			<td>{{ __('member_devices.ref_member_device_membership_id') }}
 			<td>{{ $data->ref_member_device_membership_id }} </td>
 
		</tr>
		<tr>
			<td>{{ __('member_devices.member_device_os_type') }}
 			<td>{{ $data->member_device_os_type }} </td>
 
		</tr>
		<tr>
			<td>{{ __('member_devices.member_device_token_id') }}
 			<td>{{ $data->member_device_token_id }} </td>
 
		</tr>
		<tr>
			<td>{{ __('member_devices.member_device_unique_id') }}
 			<td>{{ $data->member_device_unique_id }} </td>
 
		</tr>
		<tr>
			<td>{{ __('member_devices.member_device_storing_datetime') }}
 			<td>{{ $data->member_device_storing_datetime }} </td>
 
		</tr>
		</tbody>
</table>


@endsection