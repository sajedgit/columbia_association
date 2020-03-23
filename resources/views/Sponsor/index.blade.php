	

@extends('parent')

@section('main')


<div align="right">
	<a href="{{ route('sponsors.create') }}" class="btn btn-success btn-sm">{{ __('sponsors.create') }}</a>
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
              <h6 class="m-0 font-weight-bold text-primary">{{ __('sponsors.page_name') }}</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>{{ __('sponsors.sponsor_name') }}</th>
						 <th>{{ __('sponsors.sponsor_details') }}</th>
						 <th>{{ __('sponsors.sponsor_address') }}</th>
						 <th>{{ __('sponsors.sponsor_email') }}</th>
						 <th>{{ __('sponsors.sponsor_website') }}</th>
						 <th>{{ __('sponsors.sponsor_logo_photo') }}</th>
						 <th>{{ __('sponsors.sponsor_position') }}</th>
						 <th>{{ __('sponsors.sponsor_created_datetime') }}</th>
						 <th>{{ __('sponsors.sponsor_edited_date_time') }}</th>
						
                      <th>Action</th> 
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th>{{ __('sponsors.sponsor_name') }}</th>
						 <th>{{ __('sponsors.sponsor_details') }}</th>
						 <th>{{ __('sponsors.sponsor_address') }}</th>
						 <th>{{ __('sponsors.sponsor_email') }}</th>
						 <th>{{ __('sponsors.sponsor_website') }}</th>
						 <th>{{ __('sponsors.sponsor_logo_photo') }}</th>
						 <th>{{ __('sponsors.sponsor_position') }}</th>
						 <th>{{ __('sponsors.sponsor_created_datetime') }}</th>
						 <th>{{ __('sponsors.sponsor_edited_date_time') }}</th>
						
                      <th>Action</th> 
                    </tr>
                  </tfoot>
                  <tbody>
				   @foreach($data as $row)
                    <tr>
                      
					    <td>{{ $row->sponsor_name }}</td>
						 <td>{{ $row->sponsor_details }}</td>
						 <td>{{ $row->sponsor_address }}</td>
						 <td>{{ $row->sponsor_email }}</td>
						 <td>{{ $row->sponsor_website }}</td>
						 <td>{{ $row->sponsor_logo_photo }}</td>
						 <td>{{ $row->sponsor_position }}</td>
						 <td>{{ $row->sponsor_created_datetime }}</td>
						 <td>{{ $row->sponsor_edited_date_time }}</td>
						
					   
                       <td class="text-center"> 
					  {{ Form::open([ 'method'  => 'delete', 'route' => [ 'sponsors.destroy', $row->id ] ]) }} 
					  
							<a href="{{ route('sponsors.show', $row->id) }}" class="btn btn-primary">Show</a>
							<a href="{{ route('sponsors.edit', $row->id) }}" class="btn btn-warning">Edit</a>
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

