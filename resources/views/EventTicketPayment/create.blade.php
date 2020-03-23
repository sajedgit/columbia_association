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
	<a href="{{ route('event_ticket_payments.index') }}" class="btn btn-default">Back</a>
</div>

 
{{ Form::open([ 'method'  => 'post','class'  => '', 'route' => [ 'event_ticket_payments.store' ]  ]) }} 

	@csrf

    	<div class="form-group">
			{{ Form::label('id', (Lang::get('event_ticket_payments.enter_msg').' '.Lang::get('event_ticket_payments.id')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('ref_event_id', (Lang::get('event_ticket_payments.enter_msg').' '.Lang::get('event_ticket_payments.ref_event_id')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('event_ticket_payment_by', (Lang::get('event_ticket_payments.enter_msg').' '.Lang::get('event_ticket_payments.event_ticket_payment_by')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('event_ticket_payment_details', (Lang::get('event_ticket_payments.enter_msg').' '.Lang::get('event_ticket_payments.event_ticket_payment_details')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('event_ticket_payment_datetime', (Lang::get('event_ticket_payments.enter_msg').' '.Lang::get('event_ticket_payments.event_ticket_payment_datetime')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('event_ticket_payment_amount', (Lang::get('event_ticket_payments.enter_msg').' '.Lang::get('event_ticket_payments.event_ticket_payment_amount')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('event_ticket_payment_creating_datetime', (Lang::get('event_ticket_payments.enter_msg').' '.Lang::get('event_ticket_payments.event_ticket_payment_creating_datetime')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('event_ticket_payment_editing_datetime', (Lang::get('event_ticket_payments.enter_msg').' '.Lang::get('event_ticket_payments.event_ticket_payment_editing_datetime')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
	
		<br />
		
		
		<div class="form-group text-center">
		{{ Form::submit(Lang::get('event_ticket_payments.submit_btn_msg'), array('class' => 'btn btn-primary input-lg')) }}
		 
		</div>

{!! Form::close() !!}

@endsection



	

