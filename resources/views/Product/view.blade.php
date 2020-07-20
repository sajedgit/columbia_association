@extends('parent')

@section('main')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('products.page_title') }}</h1>
<p class="mb-4">{{ __('products.welcome_msg') }}</p>


 <div align="right">
  <a href="{{ route('products.index') }}" class="btn btn-default">Back</a>
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
			<td>{{ __('products.product_name') }}
 			<td>{{ $data->product_name }} </td>
 
		</tr>
		<tr>
			<td>{{ __('products.product_description') }}
 			<td>{{ $data->product_description }} </td>
 
		</tr>
		<tr>
			<td>{{ __('products.price') }}
 			<td>{{ $data->price }} </td>
 
		</tr>
		<tr>
			<td>{{ __('products.stock') }}
 			<td>{{ $data->stock }} </td>
 
		</tr>

		<tr>
			<td>{{ __('products.photo') }}
 			<td> <img src="{{ asset('/public/images/product/'.$data->photo) }}" > </td>
 
		</tr>


		</tbody>
</table>


@endsection