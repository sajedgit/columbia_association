

@extends('parent')

@section('main')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('memberships.page_title') }}</h1>
<p class="mb-4">{{ __('memberships.welcome_msg') }}</p>

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
                        <th>{{ __('memberships.name') }}</th>
						 <th>{{ __('memberships.username') }}</th>
						 <th>{{ __('memberships.email') }}</th>
                         <th>User Type</th>
                         <th>Photo</th>
						 <th>{{ __('memberships.active') }}</th>

                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th>{{ __('memberships.name') }}</th>
						 <th>{{ __('memberships.username') }}</th>
						 <th>{{ __('memberships.email') }}</th>
						 <th>User Type</th>
                         <th>Photo</th>
						 <th>{{ __('memberships.active') }}</th>

                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
				   @foreach($data as $row)
                    <tr>

					    <td>{{ $row->name }}</td>
						 <td>{{ $row->username }}</td>
						 <td>{{ $row->email }}</td>
						 <td>{{ $row->ess_type }}</td>
						 <td>  <img src="{{ asset('public/images/member/'.$row->photo) }}" class="img-thumbnail" width="50"/></td>
						 <td> @if($row->active) Active @else Inactive @endif</td>


                       <td class="text-center">
					  {{ Form::open([ 'method'  => 'delete', 'route' => [ 'memberships.destroy', $row->id ] ]) }}

							<a href="{{ route('memberships.show', $row->id) }}" class="btn btn-primary">Show</a>
							<a href="{{ route('memberships.edit', $row->id) }}" class="btn btn-warning">Edit</a>
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



@endsection

