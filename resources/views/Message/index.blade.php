	

@extends('parent')

@section('main')


<div align="right">
	<a href="{{ route('messages.create') }}" class="btn btn-success btn-sm">{{ __('messages.create') }}</a>
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
              <h6 class="m-0 font-weight-bold text-primary">{{ __('messages.page_name') }}</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>{{ __('messages.message_details') }}</th>
						 <th>{{ __('messages.message_active') }}</th>
						 <th>{{ __('messages.message_created_datetime') }}</th>
						 <th>{{ __('messages.message_edited_datetime') }}</th>
						
                      <th>Action</th> 
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th>{{ __('messages.message_details') }}</th>
						 <th>{{ __('messages.message_active') }}</th>
						 <th>{{ __('messages.message_created_datetime') }}</th>
						 <th>{{ __('messages.message_edited_datetime') }}</th>
						
                      <th>Action</th> 
                    </tr>
                  </tfoot>
                  <tbody>
				   @foreach($data as $row)
                    <tr>
                      
					    <td>{{ $row->message_details }}</td>
						 <td>{{ $row->message_active }}</td>
						 <td>{{ $row->message_created_datetime }}</td>
						 <td>{{ $row->message_edited_datetime }}</td>
						
					   
                       <td class="text-center"> 
					  {{ Form::open([ 'method'  => 'delete', 'route' => [ 'messages.destroy', $row->id ] ]) }} 
					  
							<a href="{{ route('messages.show', $row->id) }}" class="btn btn-primary">Show</a>
							<a href="{{ route('messages.edit', $row->id) }}" class="btn btn-warning">Edit</a>
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

