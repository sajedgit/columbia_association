@extends('parent')

@section('main')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('board_members_categories.page_title') }}</h1>
<p class="mb-4">{{ __('board_members_categories.welcome_msg') }}</p>


 <div align="right">
  <a href="{{ route('board_members_categories.index') }}" class="btn btn-default">Back</a>
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
			<td>{{ __('board_members_categories.board_members_category_name') }}
 			<td>{{ $data->board_members_category_name }} </td>
 
		</tr>
		<tr>
			<td>{{ __('board_members_categories.board_members_category_position') }}
 			<td>{{ $data->board_members_category_position }} </td>
 
		</tr>
		<tr>
			<td>{{ __('board_members_categories.board_members_category_active') }}
 			<td>{{ $data->board_members_category_active }} </td>
 
		</tr>
		</tbody>
</table>


@endsection