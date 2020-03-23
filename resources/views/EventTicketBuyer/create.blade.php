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
	<a href="{{ route('event_ticket_buyers.index') }}" class="btn btn-default">Back</a>
</div>

 
{{ Form::open([ 'method'  => 'post','class'  => '', 'route' => [ 'event_ticket_buyers.store' ]  ]) }} 

	@csrf

    	<div class="form-group">
			{{ Form::label('id', (Lang::get('event_ticket_buyers.enter_msg').' '.Lang::get('event_ticket_buyers.id')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('ref_event_id', (Lang::get('event_ticket_buyers.enter_msg').' '.Lang::get('event_ticket_buyers.ref_event_id')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('ref_membership_id', (Lang::get('event_ticket_buyers.enter_msg').' '.Lang::get('event_ticket_buyers.ref_membership_id')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('buyer_first_name', (Lang::get('event_ticket_buyers.enter_msg').' '.Lang::get('event_ticket_buyers.buyer_first_name')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('buyer_last_name', (Lang::get('event_ticket_buyers.enter_msg').' '.Lang::get('event_ticket_buyers.buyer_last_name')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('payment_type', (Lang::get('event_ticket_buyers.enter_msg').' '.Lang::get('event_ticket_buyers.payment_type')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('total_tickets', (Lang::get('event_ticket_buyers.enter_msg').' '.Lang::get('event_ticket_buyers.total_tickets')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('total_price', (Lang::get('event_ticket_buyers.enter_msg').' '.Lang::get('event_ticket_buyers.total_price')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('event_ticket_buyer_stored_datetime', (Lang::get('event_ticket_buyers.enter_msg').' '.Lang::get('event_ticket_buyers.event_ticket_buyer_stored_datetime')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
		<div class="form-group">
			{{ Form::label('event_ticket_buyer_edited_datetime', (Lang::get('event_ticket_buyers.enter_msg').' '.Lang::get('event_ticket_buyers.event_ticket_buyer_edited_datetime')),array('class'=>'control-label col-md-4')) }}	
				<div class="col-md-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control input-lg')) }}
				</div>
		    </div>
	
		<br />
		
		
		<div class="form-group text-center">
		{{ Form::submit(Lang::get('event_ticket_buyers.submit_btn_msg'), array('class' => 'btn btn-primary input-lg')) }}
		 
		</div>

{!! Form::close() !!}

@endsection



	

