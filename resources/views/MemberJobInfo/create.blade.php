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
<div align="right">
	<a href="{{ route('member_job_infos.index') }}" class="btn btn-default">Back</a>
</div>

 
{{ Form::open([ 'method'  => 'post','class'  => '', 'route' => [ 'member_job_infos.store' ]  ]) }} 

	@csrf

    	<div class="form-group">
			{{ Form::label('id', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.id')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('ref_member_job_info_membership_id', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.ref_member_job_info_membership_id')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('member_command_code', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_command_code')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('member_command_name', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_command_name')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('member_rank', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_rank')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('member_shield', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_shield')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('member_appointment_date', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_appointment_date')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('member_promoted_date', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_promoted_date')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('member_boro', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_boro')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('member_benificiary', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_benificiary')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('member_reference_no', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_reference_no')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('member_retired', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_retired')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('member_job_info_creating_datetime', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_job_info_creating_datetime')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('member_job_info_editing_datetime', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_job_info_editing_datetime')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
	
		<br />
		
		
		<div class="form-group text-center">
		{{ Form::submit(Lang::get('member_job_infos.submit_btn_msg'), array('class' => 'btn btn-primary input-lg')) }}
		 
		</div>

{!! Form::close() !!}

@endsection



	

