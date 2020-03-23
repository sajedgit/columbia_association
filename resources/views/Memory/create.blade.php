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
	<a href="{{ route('memories.index') }}" class="btn btn-default">Back</a>
</div>

 
{{ Form::open([ 'method'  => 'post','class'  => '', 'route' => [ 'memories.store' ]  ]) }} 

	@csrf

    	<div class="form-group">
			{{ Form::label('id', (Lang::get('memories.enter_msg').' '.Lang::get('memories.id')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('memories_name', (Lang::get('memories.enter_msg').' '.Lang::get('memories.memories_name')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('memories_details', (Lang::get('memories.enter_msg').' '.Lang::get('memories.memories_details')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('memories_created_date_time', (Lang::get('memories.enter_msg').' '.Lang::get('memories.memories_created_date_time')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('memories_editing_datetime', (Lang::get('memories.enter_msg').' '.Lang::get('memories.memories_editing_datetime')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('memories_active', (Lang::get('memories.enter_msg').' '.Lang::get('memories.memories_active')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
	
		<br />
		
		
		<div class="form-group text-center">
		{{ Form::submit(Lang::get('memories.submit_btn_msg'), array('class' => 'btn btn-primary input-lg')) }}
		 
		</div>

{!! Form::close() !!}

@endsection



	

