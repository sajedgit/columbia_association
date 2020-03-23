@extends('parent')

@section('main')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('organize_infos.page_title') }}</h1>
<p class="mb-4">{{ __('organize_infos.welcome_msg') }}</p>


 <div align="right">
  <a href="{{ route('organize_infos.index') }}" class="btn btn-default">Back</a>
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
			<td>{{ __('organize_infos.organize_telephone') }}
 			<td>{{ $data->organize_telephone }} </td>
 
		</tr>
		<tr>
			<td>{{ __('organize_infos.organize_email') }}
 			<td>{{ $data->organize_email }} </td>
 
		</tr>
		<tr>
			<td>{{ __('organize_infos.organize_facebook') }}
 			<td>{{ $data->organize_facebook }} </td>
 
		</tr>
		<tr>
			<td>{{ __('organize_infos.organize_instagram') }}
 			<td>{{ $data->organize_instagram }} </td>
 
		</tr>
		<tr>
			<td>{{ __('organize_infos.organize_linkedin') }}
 			<td>{{ $data->organize_linkedin }} </td>
 
		</tr>
		<tr>
			<td>{{ __('organize_infos.organize_twitter') }}
 			<td>{{ $data->organize_twitter }} </td>
 
		</tr>
		<tr>
			<td>{{ __('organize_infos.organize_info_created_edited_datetime') }}
 			<td>{{ $data->organize_info_created_edited_datetime }} </td>
 
		</tr>
		</tbody>
</table>


@endsection