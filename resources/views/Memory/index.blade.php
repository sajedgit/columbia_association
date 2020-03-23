	

@extends('parent')

@section('main')


<div align="right">
	<a href="{{ route('memories.create') }}" class="btn btn-success btn-sm">{{ __('memories.create') }}</a>
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
              <h6 class="m-0 font-weight-bold text-primary">{{ __('memories.page_name') }}</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>{{ __('memories.memories_name') }}</th>
						 <th>{{ __('memories.memories_details') }}</th>
						 <th>{{ __('memories.memories_created_date_time') }}</th>
						 <th>{{ __('memories.memories_editing_datetime') }}</th>
						 <th>{{ __('memories.memories_active') }}</th>
						
                      <th>Action</th> 
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th>{{ __('memories.memories_name') }}</th>
						 <th>{{ __('memories.memories_details') }}</th>
						 <th>{{ __('memories.memories_created_date_time') }}</th>
						 <th>{{ __('memories.memories_editing_datetime') }}</th>
						 <th>{{ __('memories.memories_active') }}</th>
						
                      <th>Action</th> 
                    </tr>
                  </tfoot>
                  <tbody>
				   @foreach($data as $row)
                    <tr>
                      
					    <td>{{ $row->memories_name }}</td>
						 <td>{{ $row->memories_details }}</td>
						 <td>{{ $row->memories_created_date_time }}</td>
						 <td>{{ $row->memories_editing_datetime }}</td>
						 <td>{{ $row->memories_active }}</td>
						
					   
                       <td class="text-center"> 
					  {{ Form::open([ 'method'  => 'delete', 'route' => [ 'memories.destroy', $row->id ] ]) }} 
					  
							<a href="{{ route('memories.show', $row->id) }}" class="btn btn-primary">Show</a>
							<a href="{{ route('memories.edit', $row->id) }}" class="btn btn-warning">Edit</a>
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

