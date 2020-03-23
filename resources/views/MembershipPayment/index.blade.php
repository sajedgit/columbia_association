	

@extends('parent')

@section('main')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('membership_payments.page_title') }}</h1>
<p class="mb-4">{{ __('membership_payments.welcome_msg') }}</p>

<div align="right">
	<a href="{{ route('membership_payments.create') }}" class="btn btn-success btn-sm">{{ __('membership_payments.create') }}</a>
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
              <h6 class="m-0 font-weight-bold text-primary">{{ __('membership_payments.page_name') }}</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>{{ __('membership_payments.ref_membership_id') }}</th>
						 <th>{{ __('membership_payments.membership_payment_ess') }}</th>
						 <th>{{ __('membership_payments.membership_payment_by') }}</th>
						 <th>{{ __('membership_payments.membership_payment_details') }}</th>
						 <th>{{ __('membership_payments.membership_payment_datetime') }}</th>
						 <th>{{ __('membership_payments.membership_payment_amount') }}</th>
						 <th>{{ __('membership_payments.membership_next_renewal_date') }}</th>
						 <th>{{ __('membership_payments.membership_payment_creating_datetime') }}</th>
						 <th>{{ __('membership_payments.membership_payment_editing_datetime') }}</th>
						
                      <th>Action</th> 
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th>{{ __('membership_payments.ref_membership_id') }}</th>
						 <th>{{ __('membership_payments.membership_payment_ess') }}</th>
						 <th>{{ __('membership_payments.membership_payment_by') }}</th>
						 <th>{{ __('membership_payments.membership_payment_details') }}</th>
						 <th>{{ __('membership_payments.membership_payment_datetime') }}</th>
						 <th>{{ __('membership_payments.membership_payment_amount') }}</th>
						 <th>{{ __('membership_payments.membership_next_renewal_date') }}</th>
						 <th>{{ __('membership_payments.membership_payment_creating_datetime') }}</th>
						 <th>{{ __('membership_payments.membership_payment_editing_datetime') }}</th>
						
                      <th>Action</th> 
                    </tr>
                  </tfoot>
                  <tbody>
				   @foreach($data as $row)
                    <tr>
                      
					    <td>{{ $row->ref_membership_id }}</td>
						 <td>{{ $row->membership_payment_ess }}</td>
						 <td>{{ $row->membership_payment_by }}</td>
						 <td>{{ $row->membership_payment_details }}</td>
						 <td>{{ $row->membership_payment_datetime }}</td>
						 <td>{{ $row->membership_payment_amount }}</td>
						 <td>{{ $row->membership_next_renewal_date }}</td>
						 <td>{{ $row->membership_payment_creating_datetime }}</td>
						 <td>{{ $row->membership_payment_editing_datetime }}</td>
						
					   
                       <td class="text-center"> 
					  {{ Form::open([ 'method'  => 'delete', 'route' => [ 'membership_payments.destroy', $row->id ] ]) }} 
					  
							<a href="{{ route('membership_payments.show', $row->id) }}" class="btn btn-primary">Show</a>
							<a href="{{ route('membership_payments.edit', $row->id) }}" class="btn btn-warning">Edit</a>
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

