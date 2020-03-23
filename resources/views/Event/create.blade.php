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
	<a href="{{ route('events.index') }}" class="btn btn-default">Back</a>
</div>

 
{{ Form::open([ 'method'  => 'post','class'  => '', 'route' => [ 'events.store' ]  ]) }} 

	@csrf

    	<div class="form-group">
			{{ Form::label('id', (Lang::get('events.enter_msg').' '.Lang::get('events.id')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('event_title', (Lang::get('events.enter_msg').' '.Lang::get('events.event_title')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('event_details', (Lang::get('events.enter_msg').' '.Lang::get('events.event_details')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('event_venue', (Lang::get('events.enter_msg').' '.Lang::get('events.event_venue')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('event_flyer_location', (Lang::get('events.enter_msg').' '.Lang::get('events.event_flyer_location')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('event_flyer_type', (Lang::get('events.enter_msg').' '.Lang::get('events.event_flyer_type')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('event_starting_date', (Lang::get('events.enter_msg').' '.Lang::get('events.event_starting_date')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('event_starting_time', (Lang::get('events.enter_msg').' '.Lang::get('events.event_starting_time')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('event_ending_date', (Lang::get('events.enter_msg').' '.Lang::get('events.event_ending_date')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('event_ending_time', (Lang::get('events.enter_msg').' '.Lang::get('events.event_ending_time')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('event_ticket_price', (Lang::get('events.enter_msg').' '.Lang::get('events.event_ticket_price')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('event_total_seat', (Lang::get('events.enter_msg').' '.Lang::get('events.event_total_seat')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('event_active', (Lang::get('events.enter_msg').' '.Lang::get('events.event_active')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('event_created_datetime', (Lang::get('events.enter_msg').' '.Lang::get('events.event_created_datetime')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('event_edited_datetime', (Lang::get('events.enter_msg').' '.Lang::get('events.event_edited_datetime')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
	
		<br />
		
		
		<div class="form-group text-center">
		{{ Form::submit(Lang::get('events.submit_btn_msg'), array('class' => 'btn btn-primary input-lg')) }}
		 
		</div>

{!! Form::close() !!}

@endsection



	

