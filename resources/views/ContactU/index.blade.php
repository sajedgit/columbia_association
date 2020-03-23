	

@extends('parent')

@section('main')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('contact_us.page_title') }}</h1>
<p class="mb-4">{{ __('contact_us.welcome_msg') }}</p>

<div align="right">
	<a href="{{ route('contact_us.create') }}" class="btn btn-success btn-sm">{{ __('contact_us.create') }}</a>
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
              <h6 class="m-0 font-weight-bold text-primary">{{ __('contact_us.page_name') }}</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>{{ __('contact_us.ref_membership_id') }}</th>
						 <th>{{ __('contact_us.contact_us_subject') }}</th>
						 <th>{{ __('contact_us.contact_us_details') }}</th>
						 <th>{{ __('contact_us.contact_us_seen') }}</th>
						 <th>{{ __('contact_us.contact_us_created_date_time') }}</th>
						
                      <th>Action</th> 
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th>{{ __('contact_us.ref_membership_id') }}</th>
						 <th>{{ __('contact_us.contact_us_subject') }}</th>
						 <th>{{ __('contact_us.contact_us_details') }}</th>
						 <th>{{ __('contact_us.contact_us_seen') }}</th>
						 <th>{{ __('contact_us.contact_us_created_date_time') }}</th>
						
                      <th>Action</th> 
                    </tr>
                  </tfoot>
                  <tbody>
				   @foreach($data as $row)
                    <tr>
                      
					    <td>{{ $row->ref_membership_id }}</td>
						 <td>{{ $row->contact_us_subject }}</td>
						 <td>{{ $row->contact_us_details }}</td>
						 <td>{{ $row->contact_us_seen }}</td>
						 <td>{{ $row->contact_us_created_date_time }}</td>
						
					   
                       <td class="text-center"> 
					  {{ Form::open([ 'method'  => 'delete', 'route' => [ 'contact_us.destroy', $row->id ] ]) }} 
					  
							<a href="{{ route('contact_us.show', $row->id) }}" class="btn btn-primary">Show</a>
							<a href="{{ route('contact_us.edit', $row->id) }}" class="btn btn-warning">Edit</a>
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

