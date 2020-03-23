	

@extends('parent')

@section('main')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('member_personal_infos.page_title') }}</h1>
<p class="mb-4">{{ __('member_personal_infos.welcome_msg') }}</p>

<div align="right">
	<a href="{{ route('member_personal_infos.create') }}" class="btn btn-success btn-sm">{{ __('member_personal_infos.create') }}</a>
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
              <h6 class="m-0 font-weight-bold text-primary">{{ __('member_personal_infos.page_name') }}</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>{{ __('member_personal_infos.ref_member_personal_info_membership_id') }}</th>
						 <th>{{ __('member_personal_infos.member_first_name') }}</th>
						 <th>{{ __('member_personal_infos.member_last_name') }}</th>
						 <th>{{ __('member_personal_infos.member_birth_date') }}</th>
						 <th>{{ __('member_personal_infos.member_gender') }}</th>
						 <th>{{ __('member_personal_infos.member_address') }}</th>
						 <th>{{ __('member_personal_infos.member_zip_code') }}</th>
						 <th>{{ __('member_personal_infos.member_email_address') }}</th>
						 <th>{{ __('member_personal_infos.member_tax_reg_no') }}</th>
						 <th>{{ __('member_personal_infos.member_personal_info_creating_datetime') }}</th>
						 <th>{{ __('member_personal_infos.member_personal_info_editing_datetime') }}</th>
						
                      <th>Action</th> 
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th>{{ __('member_personal_infos.ref_member_personal_info_membership_id') }}</th>
						 <th>{{ __('member_personal_infos.member_first_name') }}</th>
						 <th>{{ __('member_personal_infos.member_last_name') }}</th>
						 <th>{{ __('member_personal_infos.member_birth_date') }}</th>
						 <th>{{ __('member_personal_infos.member_gender') }}</th>
						 <th>{{ __('member_personal_infos.member_address') }}</th>
						 <th>{{ __('member_personal_infos.member_zip_code') }}</th>
						 <th>{{ __('member_personal_infos.member_email_address') }}</th>
						 <th>{{ __('member_personal_infos.member_tax_reg_no') }}</th>
						 <th>{{ __('member_personal_infos.member_personal_info_creating_datetime') }}</th>
						 <th>{{ __('member_personal_infos.member_personal_info_editing_datetime') }}</th>
						
                      <th>Action</th> 
                    </tr>
                  </tfoot>
                  <tbody>
				   @foreach($data as $row)
                    <tr>
                      
					    <td>{{ $row->ref_member_personal_info_membership_id }}</td>
						 <td>{{ $row->member_first_name }}</td>
						 <td>{{ $row->member_last_name }}</td>
						 <td>{{ $row->member_birth_date }}</td>
						 <td>{{ $row->member_gender }}</td>
						 <td>{{ $row->member_address }}</td>
						 <td>{{ $row->member_zip_code }}</td>
						 <td>{{ $row->member_email_address }}</td>
						 <td>{{ $row->member_tax_reg_no }}</td>
						 <td>{{ $row->member_personal_info_creating_datetime }}</td>
						 <td>{{ $row->member_personal_info_editing_datetime }}</td>
						
					   
                       <td class="text-center"> 
					  {{ Form::open([ 'method'  => 'delete', 'route' => [ 'member_personal_infos.destroy', $row->id ] ]) }} 
					  
							<a href="{{ route('member_personal_infos.show', $row->id) }}" class="btn btn-primary">Show</a>
							<a href="{{ route('member_personal_infos.edit', $row->id) }}" class="btn btn-warning">Edit</a>
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

