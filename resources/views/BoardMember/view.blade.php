@extends('parent')

@section('main')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('board_members.page_title') }}</h1>
<p class="mb-4">{{ __('board_members.welcome_msg') }}</p>


 <div align="right">
  <a href="{{ route('board_members.index') }}" class="btn btn-default">Back</a>
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
			<td>{{ __('board_members.ref_board_members_category_id') }}</td>
 			<td>{{ $data->ref_board_members_category_id }} </td>

		</tr>
		<tr>
			<td>{{ __('board_members.board_members_first_name') }}</td>
 			<td>{{ $data->board_members_first_name }} </td>

		</tr>
		<tr>
			<td>{{ __('board_members.board_members_last_name') }}</td>
 			<td>{{ $data->board_members_last_name }} </td>

		</tr>
		<tr>
			<td>Bio</td>
 			<td>{{ $data->bio }} </td>

		</tr>
		<tr>
			<td>{{ __('board_members.board_members_image_location') }}</td>
            <td><img src="{{ URL::to('/') }}/public/images/{{ $data->board_members_image_location }}" class="img-thumbnail" width="300" /></td>

		</tr>
		<tr>
			<td>{{ __('board_members.board_member_designation') }}</td>
 			<td>{{ $data->board_member_designation }} </td>

		</tr>
		<tr>
			<td>{{ __('board_members.board_members_email_address') }}</td>
 			<td>{{ $data->board_members_email_address }} </td>

		</tr>

		<tr>
			<td>{{ __('board_members.board_members_active') }}</td>
 			<td>{{ $data->board_members_active }} </td>

		</tr>
		</tbody>
</table>


@endsection
