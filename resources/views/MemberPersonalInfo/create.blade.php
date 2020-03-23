@extends('parent')

@section('main')
@if($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('member_personal_infos.page_title') }}</h1>
<p class="mb-4">{{ __('member_personal_infos.welcome_msg') }}</p>


<div align="right">
	<a href="{{ route('member_personal_infos.index') }}" class="btn btn-default">Back</a>
</div>

 
{{ Form::open([ 'method'  => 'post','class'  => 'col-sm-6', 'route' => [ 'member_personal_infos.store' ]  ]) }} 

	@csrf

    	<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('id', (Lang::get('member_personal_infos.enter_msg').' '.Lang::get('member_personal_infos.id')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('member_personal_infos.id'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('ref_member_personal_info_membership_id', (Lang::get('member_personal_infos.enter_msg').' '.Lang::get('member_personal_infos.ref_member_personal_info_membership_id')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('member_personal_infos.ref_member_personal_info_membership_id'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('member_first_name', (Lang::get('member_personal_infos.enter_msg').' '.Lang::get('member_personal_infos.member_first_name')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('member_personal_infos.member_first_name'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('member_last_name', (Lang::get('member_personal_infos.enter_msg').' '.Lang::get('member_personal_infos.member_last_name')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('member_personal_infos.member_last_name'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('member_birth_date', (Lang::get('member_personal_infos.enter_msg').' '.Lang::get('member_personal_infos.member_birth_date')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('member_personal_infos.member_birth_date'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('member_gender', (Lang::get('member_personal_infos.enter_msg').' '.Lang::get('member_personal_infos.member_gender')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('member_personal_infos.member_gender'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('member_address', (Lang::get('member_personal_infos.enter_msg').' '.Lang::get('member_personal_infos.member_address')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('member_personal_infos.member_address'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('member_zip_code', (Lang::get('member_personal_infos.enter_msg').' '.Lang::get('member_personal_infos.member_zip_code')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('member_personal_infos.member_zip_code'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('member_email_address', (Lang::get('member_personal_infos.enter_msg').' '.Lang::get('member_personal_infos.member_email_address')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('member_personal_infos.member_email_address'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('member_tax_reg_no', (Lang::get('member_personal_infos.enter_msg').' '.Lang::get('member_personal_infos.member_tax_reg_no')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('member_personal_infos.member_tax_reg_no'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('member_personal_info_creating_datetime', (Lang::get('member_personal_infos.enter_msg').' '.Lang::get('member_personal_infos.member_personal_info_creating_datetime')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('member_personal_infos.member_personal_info_creating_datetime'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('member_personal_info_editing_datetime', (Lang::get('member_personal_infos.enter_msg').' '.Lang::get('member_personal_infos.member_personal_info_editing_datetime')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('member_personal_infos.member_personal_info_editing_datetime'))) }}
				</div>
		    </div>
	
		<br />
		
		
		<div class="form-group text-center">
		{{ Form::submit(Lang::get('member_personal_infos.submit_btn_msg'), array('class' => 'btn btn-primary')) }}
		 
		</div>

{!! Form::close() !!}

@endsection



	

