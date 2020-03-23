	

@extends('parent')

@section('main')


<div align="right">
	<a href="{{ route('board_members.create') }}" class="btn btn-success btn-sm">{{ __('board_members.create') }}</a>
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
              <h6 class="m-0 font-weight-bold text-primary">{{ __('board_members.page_name') }}</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>{{ __('board_members.ref_board_members_category_id') }}</th>
						 <th>{{ __('board_members.board_members_first_name') }}</th>
						 <th>{{ __('board_members.board_members_last_name') }}</th>
						 <th>{{ __('board_members.board_members_image_location') }}</th>
						 <th>{{ __('board_members.board_member_designation') }}</th>
						 <th>{{ __('board_members.board_members_email_address') }}</th>
						 <th>{{ __('board_members.board_members_position') }}</th>
						 <th>{{ __('board_members.board_members_active') }}</th>
						
                      <th>Action</th> 
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th>{{ __('board_members.ref_board_members_category_id') }}</th>
						 <th>{{ __('board_members.board_members_first_name') }}</th>
						 <th>{{ __('board_members.board_members_last_name') }}</th>
						 <th>{{ __('board_members.board_members_image_location') }}</th>
						 <th>{{ __('board_members.board_member_designation') }}</th>
						 <th>{{ __('board_members.board_members_email_address') }}</th>
						 <th>{{ __('board_members.board_members_position') }}</th>
						 <th>{{ __('board_members.board_members_active') }}</th>
						
                      <th>Action</th> 
                    </tr>
                  </tfoot>
                  <tbody>
				   @foreach($data as $row)
                    <tr>
                      
					    <td>{{ $row->ref_board_members_category_id }}</td>
						 <td>{{ $row->board_members_first_name }}</td>
						 <td>{{ $row->board_members_last_name }}</td>
						 <td>{{ $row->board_members_image_location }}</td>
						 <td>{{ $row->board_member_designation }}</td>
						 <td>{{ $row->board_members_email_address }}</td>
						 <td>{{ $row->board_members_position }}</td>
						 <td>{{ $row->board_members_active }}</td>
						
					   
                       <td class="text-center"> 
					  {{ Form::open([ 'method'  => 'delete', 'route' => [ 'board_members.destroy', $row->id ] ]) }} 
					  
							<a href="{{ route('board_members.show', $row->id) }}" class="btn btn-primary">Show</a>
							<a href="{{ route('board_members.edit', $row->id) }}" class="btn btn-warning">Edit</a>
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

