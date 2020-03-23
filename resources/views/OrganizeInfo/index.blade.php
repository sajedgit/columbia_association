	

@extends('parent')

@section('main')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('organize_infos.page_title') }}</h1>
<p class="mb-4">{{ __('organize_infos.welcome_msg') }}</p>

<div align="right">
	<a href="{{ route('organize_infos.create') }}" class="btn btn-success btn-sm">{{ __('organize_infos.create') }}</a>
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
              <h6 class="m-0 font-weight-bold text-primary">{{ __('organize_infos.page_name') }}</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>{{ __('organize_infos.organize_telephone') }}</th>
						 <th>{{ __('organize_infos.organize_email') }}</th>
						 <th>{{ __('organize_infos.organize_facebook') }}</th>
						 <th>{{ __('organize_infos.organize_instagram') }}</th>
						 <th>{{ __('organize_infos.organize_linkedin') }}</th>
						 <th>{{ __('organize_infos.organize_twitter') }}</th>
						 <th>{{ __('organize_infos.organize_info_created_edited_datetime') }}</th>
						
                      <th>Action</th> 
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th>{{ __('organize_infos.organize_telephone') }}</th>
						 <th>{{ __('organize_infos.organize_email') }}</th>
						 <th>{{ __('organize_infos.organize_facebook') }}</th>
						 <th>{{ __('organize_infos.organize_instagram') }}</th>
						 <th>{{ __('organize_infos.organize_linkedin') }}</th>
						 <th>{{ __('organize_infos.organize_twitter') }}</th>
						 <th>{{ __('organize_infos.organize_info_created_edited_datetime') }}</th>
						
                      <th>Action</th> 
                    </tr>
                  </tfoot>
                  <tbody>
				   @foreach($data as $row)
                    <tr>
                      
					    <td>{{ $row->organize_telephone }}</td>
						 <td>{{ $row->organize_email }}</td>
						 <td>{{ $row->organize_facebook }}</td>
						 <td>{{ $row->organize_instagram }}</td>
						 <td>{{ $row->organize_linkedin }}</td>
						 <td>{{ $row->organize_twitter }}</td>
						 <td>{{ $row->organize_info_created_edited_datetime }}</td>
						
					   
                       <td class="text-center"> 
					  {{ Form::open([ 'method'  => 'delete', 'route' => [ 'organize_infos.destroy', $row->id ] ]) }} 
					  
							<a href="{{ route('organize_infos.show', $row->id) }}" class="btn btn-primary">Show</a>
							<a href="{{ route('organize_infos.edit', $row->id) }}" class="btn btn-warning">Edit</a>
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

