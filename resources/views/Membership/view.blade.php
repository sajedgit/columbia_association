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
			<td>{{ __('memberships.name') }}
 			<td>{{ $data->name }} </td>

		</tr>
		<tr>
			<td>{{ __('memberships.username') }}
 			<td>{{ $data->username }} </td>

		</tr>
		<tr>
			<td>{{ __('memberships.email') }}
 			<td>{{ $data->email }} </td>

		</tr>
		<tr>
			<td>{{ __('memberships.active') }}
 			<td>{{ $data->active }} </td>

		</tr>

		</tbody>
</table>


@endsection
