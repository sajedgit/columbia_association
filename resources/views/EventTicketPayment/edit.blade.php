
@extends('parent')

@section('main')
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
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
            <br />
			

			{{ Form::open([ 'method'  => 'post','class'  => 'col-sm-6', 'route' => [ 'event_ticket_payments.update', $data->id ] ]) }}
				
				 @csrf
                @method('PATCH')

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('id', (Lang::get('event_ticket_payments.enter_msg').' '.Lang::get('event_ticket_payments.id')),array('class'=>'control-label')) }}	
				</div>
					<div class="col-sm-8">
						{{ Form::text('id', $value = $data->id ,array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('id', (Lang::get('event_ticket_payments.enter_msg').' '.Lang::get('event_ticket_payments.ref_event_id')),array('class'=>'control-label')) }}	
				</div>
					<div class="col-sm-8">
						{{ Form::text('id', $value = $data->ref_event_id ,array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('id', (Lang::get('event_ticket_payments.enter_msg').' '.Lang::get('event_ticket_payments.event_ticket_payment_by')),array('class'=>'control-label')) }}	
				</div>
					<div class="col-sm-8">
						{{ Form::text('id', $value = $data->event_ticket_payment_by ,array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('id', (Lang::get('event_ticket_payments.enter_msg').' '.Lang::get('event_ticket_payments.event_ticket_payment_details')),array('class'=>'control-label')) }}	
				</div>
					<div class="col-sm-8">
						{{ Form::text('id', $value = $data->event_ticket_payment_details ,array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('id', (Lang::get('event_ticket_payments.enter_msg').' '.Lang::get('event_ticket_payments.event_ticket_payment_datetime')),array('class'=>'control-label')) }}	
				</div>
					<div class="col-sm-8">
						{{ Form::text('id', $value = $data->event_ticket_payment_datetime ,array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('id', (Lang::get('event_ticket_payments.enter_msg').' '.Lang::get('event_ticket_payments.event_ticket_payment_amount')),array('class'=>'control-label')) }}	
				</div>
					<div class="col-sm-8">
						{{ Form::text('id', $value = $data->event_ticket_payment_amount ,array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('id', (Lang::get('event_ticket_payments.enter_msg').' '.Lang::get('event_ticket_payments.event_ticket_payment_creating_datetime')),array('class'=>'control-label')) }}	
				</div>
					<div class="col-sm-8">
						{{ Form::text('id', $value = $data->event_ticket_payment_creating_datetime ,array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('id', (Lang::get('event_ticket_payments.enter_msg').' '.Lang::get('event_ticket_payments.event_ticket_payment_editing_datetime')),array('class'=>'control-label')) }}	
				</div>
					<div class="col-sm-8">
						{{ Form::text('id', $value = $data->event_ticket_payment_editing_datetime ,array('class' => 'form-control')) }}
					</div>
				</div>

				
				<br />
					
					
				
				<div class="form-group">
				<label class="control-label ">&nbsp;&nbsp;</label>
				{{ Form::submit(Lang::get('event_ticket_payments.update_btn_msg'), array('class' => 'btn btn-primary')) }}
				</div>

			{!! Form::close() !!}
			
@endsection			
			