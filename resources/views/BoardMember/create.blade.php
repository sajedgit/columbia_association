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
	<a href="{{ route('board_members.index') }}" class="btn btn-default">Back</a>
</div>

 
{{ Form::open([ 'method'  => 'post','class'  => '', 'route' => [ 'board_members.store' ]  ]) }} 

	@csrf

    	 
		<div class="form-group">
			{{ Form::label('ref_board_members_category_id', (Lang::get('board_members.enter_msg').' '.Lang::get('board_members.ref_board_members_category_id')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('board_members_first_name', (Lang::get('board_members.enter_msg').' '.Lang::get('board_members.board_members_first_name')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('board_members_last_name', (Lang::get('board_members.enter_msg').' '.Lang::get('board_members.board_members_last_name')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('board_members_image_location', (Lang::get('board_members.enter_msg').' '.Lang::get('board_members.board_members_image_location')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('board_member_designation', (Lang::get('board_members.enter_msg').' '.Lang::get('board_members.board_member_designation')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('board_members_email_address', (Lang::get('board_members.enter_msg').' '.Lang::get('board_members.board_members_email_address')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('board_members_position', (Lang::get('board_members.enter_msg').' '.Lang::get('board_members.board_members_position')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('board_members_active', (Lang::get('board_members.enter_msg').' '.Lang::get('board_members.board_members_active')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
	
		<br />
		
		
		<div class="form-group text-center">
		{{ Form::submit(Lang::get('board_members.submit_btn_msg'), array('class' => 'btn btn-primary input-lg')) }}
		 
		</div>

{!! Form::close() !!}

@endsection



	

