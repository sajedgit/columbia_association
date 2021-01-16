@extends('parent')

@section('main')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('ess_members.page_title') }}</h1>
<p class="mb-4">{{ __('ess_members.welcome_msg') }}</p>


 <div align="right">
  <a href="{{ route('ess_members.index') }}" class="btn btn-default">Back</a>
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
			<td>{{ __('ess_members.type') }}</td>
 			<td>{{ $data->type }} </td>

		</tr>
		<tr>
			<td>{{ __('ess_members.name') }}</td>
 			<td>{{ $data->name }} </td>

		</tr>
		<tr>
			<td>{{ __('ess_members.email') }}</td>
 			<td>{{ $data->email }} </td>

		</tr>


		<tr>
			<td>{{ __('ess_members.active') }}</td>
 			<td> @if($data->active) Active @else Inactive @endif  </td>

		</tr>
		</tbody>
</table>


@endsection
