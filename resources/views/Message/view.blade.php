@extends('parent')

@section('main')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('messages.page_title') }}</h1>
<p class="mb-4">{{ __('messages.welcome_msg') }}</p>


 <div align="right">
  <a href="{{ route('messages.index') }}" class="btn btn-default">Back</a>
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
			<td>{{ __('messages.message_details') }}
 			<td> <?php echo  $data->message_details ?> </td>
 
		</tr>

		</tbody>
</table>


@endsection