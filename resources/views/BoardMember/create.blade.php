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
<h1 class="h3 mb-2 text-gray-800">{{ __('board_members.page_title') }}</h1>
<p class="mb-4">{{ __('board_members.welcome_msg') }}</p>


<div align="right">
	<a href="{{ route('board_members.index') }}" class="btn btn-default">Back</a>
</div>

 
{{ Form::open([ 'method'  => 'post','class'  => 'col-sm-6', 'route' => [ 'board_members.store' ]  ]) }} 

	@csrf

    	<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('id', (Lang::get('board_members.enter_msg').' '.Lang::get('board_members.id')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('board_members.id'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('ref_board_members_category_id', (Lang::get('board_members.enter_msg').' '.Lang::get('board_members.ref_board_members_category_id')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('board_members.ref_board_members_category_id'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('board_members_first_name', (Lang::get('board_members.enter_msg').' '.Lang::get('board_members.board_members_first_name')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('board_members.board_members_first_name'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('board_members_last_name', (Lang::get('board_members.enter_msg').' '.Lang::get('board_members.board_members_last_name')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('board_members.board_members_last_name'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('board_members_image_location', (Lang::get('board_members.enter_msg').' '.Lang::get('board_members.board_members_image_location')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('board_members.board_members_image_location'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('board_member_designation', (Lang::get('board_members.enter_msg').' '.Lang::get('board_members.board_member_designation')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('board_members.board_member_designation'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('board_members_email_address', (Lang::get('board_members.enter_msg').' '.Lang::get('board_members.board_members_email_address')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('board_members.board_members_email_address'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('board_members_position', (Lang::get('board_members.enter_msg').' '.Lang::get('board_members.board_members_position')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('board_members.board_members_position'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('board_members_active', (Lang::get('board_members.enter_msg').' '.Lang::get('board_members.board_members_active')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('board_members.board_members_active'))) }}
				</div>
		    </div>
	
		<br />
		
		
		<div class="form-group text-center">
		{{ Form::submit(Lang::get('board_members.submit_btn_msg'), array('class' => 'btn btn-primary')) }}
		 
		</div>

{!! Form::close() !!}

@endsection



	

