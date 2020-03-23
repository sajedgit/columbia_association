	

@extends('parent')

@section('main')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('event_ticket_buyers.page_title') }}</h1>
<p class="mb-4">{{ __('event_ticket_buyers.welcome_msg') }}</p>

<div align="right">
	<a href="{{ route('event_ticket_buyers.create') }}" class="btn btn-success btn-sm">{{ __('event_ticket_buyers.create') }}</a>
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
              <h6 class="m-0 font-weight-bold text-primary">{{ __('event_ticket_buyers.page_name') }}</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>{{ __('event_ticket_buyers.ref_event_id') }}</th>
						 <th>{{ __('event_ticket_buyers.ref_membership_id') }}</th>
						 <th>{{ __('event_ticket_buyers.buyer_first_name') }}</th>
						 <th>{{ __('event_ticket_buyers.buyer_last_name') }}</th>
						 <th>{{ __('event_ticket_buyers.payment_type') }}</th>
						 <th>{{ __('event_ticket_buyers.total_tickets') }}</th>
						 <th>{{ __('event_ticket_buyers.total_price') }}</th>
						 <th>{{ __('event_ticket_buyers.event_ticket_buyer_stored_datetime') }}</th>
						 <th>{{ __('event_ticket_buyers.event_ticket_buyer_edited_datetime') }}</th>
						
                      <th>Action</th> 
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th>{{ __('event_ticket_buyers.ref_event_id') }}</th>
						 <th>{{ __('event_ticket_buyers.ref_membership_id') }}</th>
						 <th>{{ __('event_ticket_buyers.buyer_first_name') }}</th>
						 <th>{{ __('event_ticket_buyers.buyer_last_name') }}</th>
						 <th>{{ __('event_ticket_buyers.payment_type') }}</th>
						 <th>{{ __('event_ticket_buyers.total_tickets') }}</th>
						 <th>{{ __('event_ticket_buyers.total_price') }}</th>
						 <th>{{ __('event_ticket_buyers.event_ticket_buyer_stored_datetime') }}</th>
						 <th>{{ __('event_ticket_buyers.event_ticket_buyer_edited_datetime') }}</th>
						
                      <th>Action</th> 
                    </tr>
                  </tfoot>
                  <tbody>
				   @foreach($data as $row)
                    <tr>
                      
					    <td>{{ $row->ref_event_id }}</td>
						 <td>{{ $row->ref_membership_id }}</td>
						 <td>{{ $row->buyer_first_name }}</td>
						 <td>{{ $row->buyer_last_name }}</td>
						 <td>{{ $row->payment_type }}</td>
						 <td>{{ $row->total_tickets }}</td>
						 <td>{{ $row->total_price }}</td>
						 <td>{{ $row->event_ticket_buyer_stored_datetime }}</td>
						 <td>{{ $row->event_ticket_buyer_edited_datetime }}</td>
						
					   
                       <td class="text-center"> 
					  {{ Form::open([ 'method'  => 'delete', 'route' => [ 'event_ticket_buyers.destroy', $row->id ] ]) }} 
					  
							<a href="{{ route('event_ticket_buyers.show', $row->id) }}" class="btn btn-primary">Show</a>
							<a href="{{ route('event_ticket_buyers.edit', $row->id) }}" class="btn btn-warning">Edit</a>
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

