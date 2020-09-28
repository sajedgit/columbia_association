@extends('parent')

@section('main')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('votes_position.page_title') }}</h1>
<p class="mb-4">{{ __('votes_position.welcome_msg') }}</p>


 <div align="right">
  <a href="{{ route('votes_position.index') }}" class="btn btn-default">Back</a>
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
			<td>{{ __('votes_position.vote_id') }}
 			<td>{{ $data[0]->vote_name }} </td>
 
		</tr>
		<tr>
			<td>{{ __('votes_position.position_name') }}
 			<td>{{ $data[0]->position_name }} </td>
 
		</tr>
		<tr>
			<td>{{ __('votes_position.noc') }}
 			<td>{{ $data[0]->noc }} </td>
 
		</tr>
		<tr>
			<td>{{ __('votes_position.sort_order') }}
 			<td>{{ $data[0]->sort_order }} </td>
 
		</tr>





		</tbody>
</table>


@endsection