	

@extends('parent')

@section('main')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('member_devices.page_title') }}</h1>
<p class="mb-4">{{ __('member_devices.welcome_msg') }}</p>

<div align="right">
	<a href="{{ route('member_devices.create') }}" class="btn btn-success btn-sm">{{ __('member_devices.create') }}</a>
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
              <h6 class="m-0 font-weight-bold text-primary">{{ __('member_devices.page_name') }}</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>{{ __('member_devices.ref_member_device_membership_id') }}</th>
						 <th>{{ __('member_devices.member_device_os_type') }}</th>
						 <th>{{ __('member_devices.member_device_token_id') }}</th>
						 <th>{{ __('member_devices.member_device_unique_id') }}</th>
						 <th>{{ __('member_devices.member_device_storing_datetime') }}</th>
						
                      <th>Action</th> 
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th>{{ __('member_devices.ref_member_device_membership_id') }}</th>
						 <th>{{ __('member_devices.member_device_os_type') }}</th>
						 <th>{{ __('member_devices.member_device_token_id') }}</th>
						 <th>{{ __('member_devices.member_device_unique_id') }}</th>
						 <th>{{ __('member_devices.member_device_storing_datetime') }}</th>
						
                      <th>Action</th> 
                    </tr>
                  </tfoot>
                  <tbody>
				   @foreach($data as $row)
                    <tr>
                      
					    <td>{{ $row->ref_member_device_membership_id }}</td>
						 <td>{{ $row->member_device_os_type }}</td>
						 <td>{{ $row->member_device_token_id }}</td>
						 <td>{{ $row->member_device_unique_id }}</td>
						 <td>{{ $row->member_device_storing_datetime }}</td>
						
					   
                       <td class="text-center"> 
					  {{ Form::open([ 'method'  => 'delete', 'route' => [ 'member_devices.destroy', $row->id ] ]) }} 
					  
							<a href="{{ route('member_devices.show', $row->id) }}" class="btn btn-primary">Show</a>
							<a href="{{ route('member_devices.edit', $row->id) }}" class="btn btn-warning">Edit</a>
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

