@extends('parent')

@section('main')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('memories_photos.page_title') }}</h1>
<p class="mb-4">{{ __('memories_photos.welcome_msg') }}</p>


 <div align="right">
  <a href="{{ route('memories_photos.index') }}" class="btn btn-default">Back</a>
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
			<td>{{ __('memories_photos.ref_memories_id') }}
 			<td>{{ $data->ref_memories_id }} </td>

		</tr>
		<tr>
			<td>{{ __('memories_photos.memories_photo_location') }}
 			<td><img width="200" src="{{ asset($data->memories_photo_location) }} "> </td>

		</tr>

		</tbody>
</table>


@endsection
