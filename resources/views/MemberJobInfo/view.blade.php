@extends('parent')

@section('main')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('member_job_infos.page_title') }}</h1>
<p class="mb-4">{{ __('member_job_infos.welcome_msg') }}</p>


 <div align="right">
  <a href="{{ route('member_job_infos.index') }}" class="btn btn-default">Back</a>
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
			<td>{{ __('member_job_infos.ref_member_job_info_membership_id') }}
 			<td>{{ $data->ref_member_job_info_membership_id }} </td>
 
		</tr>
		<tr>
			<td>{{ __('member_job_infos.member_command_code') }}
 			<td>{{ $data->member_command_code }} </td>
 
		</tr>
		<tr>
			<td>{{ __('member_job_infos.member_command_name') }}
 			<td>{{ $data->member_command_name }} </td>
 
		</tr>
		<tr>
			<td>{{ __('member_job_infos.member_rank') }}
 			<td>{{ $data->member_rank }} </td>
 
		</tr>
		<tr>
			<td>{{ __('member_job_infos.member_shield') }}
 			<td>{{ $data->member_shield }} </td>
 
		</tr>
		<tr>
			<td>{{ __('member_job_infos.member_appointment_date') }}
 			<td>{{ $data->member_appointment_date }} </td>
 
		</tr>
		<tr>
			<td>{{ __('member_job_infos.member_promoted_date') }}
 			<td>{{ $data->member_promoted_date }} </td>
 
		</tr>
		<tr>
			<td>{{ __('member_job_infos.member_boro') }}
 			<td>{{ $data->member_boro }} </td>
 
		</tr>
		<tr>
			<td>{{ __('member_job_infos.member_benificiary') }}
 			<td>{{ $data->member_benificiary }} </td>
 
		</tr>
		<tr>
			<td>{{ __('member_job_infos.member_reference_no') }}
 			<td>{{ $data->member_reference_no }} </td>
 
		</tr>
		<tr>
			<td>{{ __('member_job_infos.member_retired') }}
 			<td>{{ $data->member_retired }} </td>
 
		</tr>
		<tr>
			<td>{{ __('member_job_infos.member_job_info_creating_datetime') }}
 			<td>{{ $data->member_job_info_creating_datetime }} </td>
 
		</tr>
		<tr>
			<td>{{ __('member_job_infos.member_job_info_editing_datetime') }}
 			<td>{{ $data->member_job_info_editing_datetime }} </td>
 
		</tr>
		</tbody>
</table>


@endsection