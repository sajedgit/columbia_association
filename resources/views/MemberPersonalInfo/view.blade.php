@extends('parent')

@section('main')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('member_personal_infos.page_title') }}</h1>
<p class="mb-4">{{ __('member_personal_infos.welcome_msg') }}</p>


 <div align="right">
  <a href="{{ route('member_personal_infos.index') }}" class="btn btn-default">Back</a>
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
			<td>{{ __('member_personal_infos.ref_member_personal_info_membership_id') }}
 			<td>{{ $data->ref_member_personal_info_membership_id }} </td>
 
		</tr>
		<tr>
			<td>{{ __('member_personal_infos.member_first_name') }}
 			<td>{{ $data->member_first_name }} </td>
 
		</tr>
		<tr>
			<td>{{ __('member_personal_infos.member_last_name') }}
 			<td>{{ $data->member_last_name }} </td>
 
		</tr>
		<tr>
			<td>{{ __('member_personal_infos.member_birth_date') }}
 			<td>{{ $data->member_birth_date }} </td>
 
		</tr>
		<tr>
			<td>{{ __('member_personal_infos.member_gender') }}
 			<td>{{ $data->member_gender }} </td>
 
		</tr>
		<tr>
			<td>{{ __('member_personal_infos.member_address') }}
 			<td>{{ $data->member_address }} </td>
 
		</tr>
		<tr>
			<td>{{ __('member_personal_infos.member_zip_code') }}
 			<td>{{ $data->member_zip_code }} </td>
 
		</tr>
		<tr>
			<td>{{ __('member_personal_infos.member_email_address') }}
 			<td>{{ $data->member_email_address }} </td>
 
		</tr>
		<tr>
			<td>{{ __('member_personal_infos.member_tax_reg_no') }}
 			<td>{{ $data->member_tax_reg_no }} </td>
 
		</tr>
		<tr>
			<td>{{ __('member_personal_infos.member_personal_info_creating_datetime') }}
 			<td>{{ $data->member_personal_info_creating_datetime }} </td>
 
		</tr>
		<tr>
			<td>{{ __('member_personal_infos.member_personal_info_editing_datetime') }}
 			<td>{{ $data->member_personal_info_editing_datetime }} </td>
 
		</tr>
		</tbody>
</table>


@endsection