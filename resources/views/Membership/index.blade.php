	

@extends('parent')

@section('main')


<div align="right">
	<a href="{{ route('memberships.create') }}" class="btn btn-success btn-sm">{{ __('memberships.create') }}</a>
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
              <h6 class="m-0 font-weight-bold text-primary">{{ __('memberships.page_name') }}</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>{{ __('memberships.membership_username') }}</th>
						 <th>{{ __('memberships.membership_password_value') }}</th>
						 <th>{{ __('memberships.membership_status') }}</th>
						 <th>{{ __('memberships.membership_expired_date') }}</th>
						 <th>{{ __('memberships.membership_creating_datetime') }}</th>
						 <th>{{ __('memberships.membership_editing_datetime') }}</th>
						
                      <th>Action</th> 
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th>{{ __('memberships.membership_username') }}</th>
						 <th>{{ __('memberships.membership_password_value') }}</th>
						 <th>{{ __('memberships.membership_status') }}</th>
						 <th>{{ __('memberships.membership_expired_date') }}</th>
						 <th>{{ __('memberships.membership_creating_datetime') }}</th>
						 <th>{{ __('memberships.membership_editing_datetime') }}</th>
						
                      <th>Action</th> 
                    </tr>
                  </tfoot>
                  <tbody>
				   @foreach($data as $row)
                    <tr>
                      
					    <td>{{ $row->membership_username }}</td>
						 <td>{{ $row->membership_password_value }}</td>
						 <td>{{ $row->membership_status }}</td>
						 <td>{{ $row->membership_expired_date }}</td>
						 <td>{{ $row->membership_creating_datetime }}</td>
						 <td>{{ $row->membership_editing_datetime }}</td>
						
					   
                       <td class="text-center"> 
					  {{ Form::open([ 'method'  => 'delete', 'route' => [ 'memberships.destroy', $row->id ] ]) }} 
					  
							<a href="{{ route('memberships.show', $row->id) }}" class="btn btn-primary">Show</a>
							<a href="{{ route('memberships.edit', $row->id) }}" class="btn btn-warning">Edit</a>
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger">Delete</button>
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

