@extends('parent')

@section('main')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('sponsors.page_title') }}</h1>
<p class="mb-4">{{ __('sponsors.welcome_msg') }}</p>


 <div align="right">
  <a href="{{ route('sponsors.index') }}" class="btn btn-default">Back</a>
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
			<td>{{ __('sponsors.sponsor_name') }}
 			<td>{{ $data->sponsor_name }} </td>
 
		</tr>
		<tr>
			<td>{{ __('sponsors.sponsor_details') }}
 			<td>{{ $data->sponsor_details }} </td>
 
		</tr>
		<tr>
			<td>{{ __('sponsors.sponsor_address') }}
 			<td>{{ $data->sponsor_address }} </td>
 
		</tr>
		<tr>
			<td>{{ __('sponsors.sponsor_email') }}
 			<td>{{ $data->sponsor_email }} </td>
 
		</tr>
		<tr>
			<td>{{ __('sponsors.sponsor_website') }}
 			<td>{{ $data->sponsor_website }} </td>
 
		</tr>
		<tr>
			<td>{{ __('sponsors.sponsor_logo_photo') }}
 			<td> <img src="{{ asset('/public/images/sponsor/'.$data->sponsor_logo_photo) }}" > </td>
 
		</tr>


		</tbody>
</table>


@endsection