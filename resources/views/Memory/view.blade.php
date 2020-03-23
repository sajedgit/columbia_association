@extends('parent')

@section('main')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('memories.page_title') }}</h1>
<p class="mb-4">{{ __('memories.welcome_msg') }}</p>


 <div align="right">
  <a href="{{ route('memories.index') }}" class="btn btn-default">Back</a>
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
			<td>{{ __('memories.memories_name') }}
 			<td>{{ $data->memories_name }} </td>
 
		</tr>
		<tr>
			<td>{{ __('memories.memories_details') }}
 			<td>{{ $data->memories_details }} </td>
 
		</tr>
		<tr>
			<td>{{ __('memories.memories_created_date_time') }}
 			<td>{{ $data->memories_created_date_time }} </td>
 
		</tr>
		<tr>
			<td>{{ __('memories.memories_editing_datetime') }}
 			<td>{{ $data->memories_editing_datetime }} </td>
 
		</tr>
		<tr>
			<td>{{ __('memories.memories_active') }}
 			<td>{{ $data->memories_active }} </td>
 
		</tr>
		</tbody>
</table>


@endsection