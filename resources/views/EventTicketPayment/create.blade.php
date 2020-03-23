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
<h1 class="h3 mb-2 text-gray-800">{{ __('event_ticket_payments.page_title') }}</h1>
<p class="mb-4">{{ __('event_ticket_payments.welcome_msg') }}</p>


<div align="right">
	<a href="{{ route('event_ticket_payments.index') }}" class="btn btn-default">Back</a>
</div>

 
{{ Form::open([ 'method'  => 'post','class'  => 'col-sm-6', 'route' => [ 'event_ticket_payments.store' ]  ]) }} 

	@csrf

    	<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('id', (Lang::get('event_ticket_payments.enter_msg').' '.Lang::get('event_ticket_payments.id')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('event_ticket_payments.id'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('ref_event_id', (Lang::get('event_ticket_payments.enter_msg').' '.Lang::get('event_ticket_payments.ref_event_id')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('event_ticket_payments.ref_event_id'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('event_ticket_payment_by', (Lang::get('event_ticket_payments.enter_msg').' '.Lang::get('event_ticket_payments.event_ticket_payment_by')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('event_ticket_payments.event_ticket_payment_by'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('event_ticket_payment_details', (Lang::get('event_ticket_payments.enter_msg').' '.Lang::get('event_ticket_payments.event_ticket_payment_details')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('event_ticket_payments.event_ticket_payment_details'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('event_ticket_payment_datetime', (Lang::get('event_ticket_payments.enter_msg').' '.Lang::get('event_ticket_payments.event_ticket_payment_datetime')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('event_ticket_payments.event_ticket_payment_datetime'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('event_ticket_payment_amount', (Lang::get('event_ticket_payments.enter_msg').' '.Lang::get('event_ticket_payments.event_ticket_payment_amount')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('event_ticket_payments.event_ticket_payment_amount'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('event_ticket_payment_creating_datetime', (Lang::get('event_ticket_payments.enter_msg').' '.Lang::get('event_ticket_payments.event_ticket_payment_creating_datetime')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('event_ticket_payments.event_ticket_payment_creating_datetime'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('event_ticket_payment_editing_datetime', (Lang::get('event_ticket_payments.enter_msg').' '.Lang::get('event_ticket_payments.event_ticket_payment_editing_datetime')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('event_ticket_payments.event_ticket_payment_editing_datetime'))) }}
				</div>
		    </div>
	
		<br />
		
		
		<div class="form-group text-center">
		{{ Form::submit(Lang::get('event_ticket_payments.submit_btn_msg'), array('class' => 'btn btn-primary')) }}
		 
		</div>

{!! Form::close() !!}

@endsection



	

