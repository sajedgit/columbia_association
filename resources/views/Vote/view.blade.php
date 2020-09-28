@extends('parent')

@section('main')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('votes.page_title') }}</h1>
<p class="mb-4">{{ __('votes.welcome_msg') }}</p>


 <div align="right">
  <a href="{{ route('votes.index') }}" class="btn btn-default">Back</a>
 </div>
 <br />


{{--'vote_name' => 'Vote Name',--}}
{{--'description' => 'Vote Details',--}}
{{--'voting_date' => 'Voting Date',--}}
{{--'start_time' => 'Voting time',--}}
{{--'end_time' => 'End Time ',--}}

 <table class="table table-striped">
        <thead >
        <tr class="info">

            <th scope="col">Column</th>
            <th scope="col">Value</th>
        </tr>
        </thead>
        <tbody>
		<tr>
			<td>{{ __('votes.vote_name') }}
 			<td>{{ $data->vote_name }} </td>
 
		</tr>
		<tr>
			<td>{{ __('votes.description') }}
 			<td>{{ $data->description }} </td>
 
		</tr>
		<tr>
			<td>{{ __('votes.voting_date') }}
 			<td>{{ $data->voting_date }} </td>
 
		</tr>
		<tr>
			<td>{{ __('votes.start_time') }}
 			<td>{{ $data->start_time }} </td>
 
		</tr>
		<tr>
			<td>{{ __('votes.end_time') }}
 			<td>{{ $data->end_time }} </td>

		</tr>




		</tbody>
</table>


@endsection