@extends('parent')

@section('main')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('memberships.page_title') }}</h1>
<p class="mb-4">{{ __('memberships.welcome_msg') }}</p>


 <div align="right">
  <a href="{{ route('memberships.index') }}" class="btn btn-default">Back</a>
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
			<td>{{ __('memberships.membership_username') }}
 			<td>{{ $data->membership_username }} </td>

		</tr>
		<tr>
			<td>{{ __('memberships.membership_password_value') }}
 			<td>{{ $data->membership_password_value }} </td>

		</tr>
		<tr>
			<td>{{ __('memberships.membership_status') }}
 			<td>{{ $data->membership_status }} </td>

		</tr>
		<tr>
			<td>{{ __('memberships.membership_expired_date') }}
 			<td>{{ $data->membership_expired_date }} </td>

		</tr>

		</tbody>
</table>


@endsection
