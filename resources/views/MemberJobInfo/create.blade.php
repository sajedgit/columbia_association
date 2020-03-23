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
<h1 class="h3 mb-2 text-gray-800">{{ __('member_job_infos.page_title') }}</h1>
<p class="mb-4">{{ __('member_job_infos.welcome_msg') }}</p>


<div align="right">
	<a href="{{ route('member_job_infos.index') }}" class="btn btn-default">Back</a>
</div>

 
{{ Form::open([ 'method'  => 'post','class'  => 'col-sm-6', 'route' => [ 'member_job_infos.store' ]  ]) }} 

	@csrf

    	<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('id', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.id')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('member_job_infos.id'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('ref_member_job_info_membership_id', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.ref_member_job_info_membership_id')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('member_job_infos.ref_member_job_info_membership_id'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('member_command_code', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_command_code')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('member_job_infos.member_command_code'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('member_command_name', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_command_name')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('member_job_infos.member_command_name'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('member_rank', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_rank')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('member_job_infos.member_rank'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('member_shield', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_shield')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('member_job_infos.member_shield'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('member_appointment_date', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_appointment_date')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('member_job_infos.member_appointment_date'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('member_promoted_date', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_promoted_date')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('member_job_infos.member_promoted_date'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('member_boro', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_boro')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('member_job_infos.member_boro'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('member_benificiary', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_benificiary')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('member_job_infos.member_benificiary'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('member_reference_no', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_reference_no')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('member_job_infos.member_reference_no'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('member_retired', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_retired')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('member_job_infos.member_retired'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('member_job_info_creating_datetime', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_job_info_creating_datetime')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('member_job_infos.member_job_info_creating_datetime'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('member_job_info_editing_datetime', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_job_info_editing_datetime')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('member_job_infos.member_job_info_editing_datetime'))) }}
				</div>
		    </div>
	
		<br />
		
		
		<div class="form-group text-center">
		{{ Form::submit(Lang::get('member_job_infos.submit_btn_msg'), array('class' => 'btn btn-primary')) }}
		 
		</div>

{!! Form::close() !!}

@endsection



	

