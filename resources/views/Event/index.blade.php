

@extends('parent')

@section('main')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('events.page_title') }}</h1>
<p class="mb-4">{{ __('events.welcome_msg') }}</p>

<div align="right">
	<a href="{{ route('events.create') }}" class="btn btn-success btn-sm">{{ __('events.create') }}</a>
</div>
<br />
@if ($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif


	 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">{{ __('events.page_name') }}</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>{{ __('events.event_title') }}</th>
{{--						 <th>{{ __('events.event_details') }}</th>--}}
						 <th>{{ __('events.event_venue') }}</th>
						 <th>{{ __('events.event_flyer_location') }}</th>
{{--						 <th>{{ __('events.event_flyer_type') }}</th>--}}
						 <th>{{ __('events.event_starting_date') }}</th>
{{--						 <th>{{ __('events.event_starting_time') }}</th>--}}
{{--						 <th>{{ __('events.event_ending_date') }}</th>--}}
{{--						 <th>{{ __('events.event_ending_time') }}</th>--}}
						 <th>{{ __('events.event_ticket_price') }}</th>
						 <th>{{ __('events.event_ticket_price_children') }}</th>
						 <th>{{ __('events.event_total_seat') }}</th>
						 <th>{{ __('events.event_active') }}</th>
{{--						 <th>{{ __('events.event_created_datetime') }}</th>--}}
{{--						 <th>{{ __('events.event_edited_datetime') }}</th>--}}

                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th>{{ __('events.event_title') }}</th>
{{--						 <th>{{ __('events.event_details') }}</th>--}}
						 <th>{{ __('events.event_venue') }}</th>
						 <th>{{ __('events.event_flyer_location') }}</th>
{{--						 <th>{{ __('events.event_flyer_type') }}</th>--}}
						 <th>{{ __('events.event_starting_date') }}</th>
{{--						 <th>{{ __('events.event_starting_time') }}</th>--}}
{{--						 <th>{{ __('events.event_ending_date') }}</th>--}}
{{--						 <th>{{ __('events.event_ending_time') }}</th>--}}
						 <th>{{ __('events.event_ticket_price') }}</th>
						 <th>{{ __('events.event_ticket_price_children') }}</th>
						 <th>{{ __('events.event_total_seat') }}</th>
						 <th>{{ __('events.event_active') }}</th>
{{--						 <th>{{ __('events.event_created_datetime') }}</th>--}}
{{--						 <th>{{ __('events.event_edited_datetime') }}</th>--}}

                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
				   @foreach($data as $row)
                    <tr>

					    <td>{{ $row->event_title }}</td>
{{--						 <td>{{ $row->event_details }}</td>--}}
						 <td>{{ $row->event_venue }}</td>
						 <td><img width="50" src="{{ URL::to('/') }}/public/images/{{ $row->event_flyer_location }}"></td>
{{--						 <td>{{ $row->event_flyer_type }}</td>--}}
						 <td>{{ $row->event_starting_date }}</td>
{{--						 <td>{{ $row->event_starting_time }}</td>--}}
{{--						 <td>{{ $row->event_ending_date }}</td>--}}
{{--						 <td>{{ $row->event_ending_time }}</td>--}}
						 <td>{{ $row->event_ticket_price }}</td>
						 <td>{{ $row->event_ticket_price_children }}</td>
						 <td>{{ $row->event_total_seat }}</td>
						 <td>{{ $row->event_active }}</td>
{{--						 <td>{{ $row->event_created_datetime }}</td>--}}
{{--						 <td>{{ $row->event_edited_datetime }}</td>--}}


                       <td class="text-center">
					  {{ Form::open([ 'method'  => 'delete', 'route' => [ 'events.destroy', $row->id ] ]) }}

							<a href="{{ route('events.show', $row->id) }}" class="btn btn-primary">Show</a>
							<a href="{{ route('events.edit', $row->id) }}" class="btn btn-warning">Edit</a>
							@csrf
							@method('DELETE')
							<button type="submit"  onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Delete</button>
					  {{ Form::close() }}

					   </td>

                    </tr>
					@endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>

		 </div>
        <!-- /.container-fluid -->


{!! $data->links() !!}
@endsection

