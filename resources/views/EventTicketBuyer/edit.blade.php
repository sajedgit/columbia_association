
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
			<h1 class="h3 mb-2 text-gray-800">{{ __('event_ticket_buyers.page_title') }}</h1>
			<p class="mb-4">{{ __('event_ticket_buyers.welcome_msg') }}</p>
			
            <div align="right">
                <a href="{{ route('event_ticket_buyers.index') }}" class="btn btn-default">Back</a>
            </div>
            <br />
			

			{{ Form::open([ 'method'  => 'post','class'  => 'col-sm-6', 'route' => [ 'event_ticket_buyers.update', $data->id ] ]) }}
				
				 @csrf
                @method('PATCH')

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('id', (Lang::get('event_ticket_buyers.enter_msg').' '.Lang::get('event_ticket_buyers.id')),array('class'=>'control-label')) }}	
				</div>
					<div class="col-sm-8">
						{{ Form::text('id', $value = $data->id ,array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('id', (Lang::get('event_ticket_buyers.enter_msg').' '.Lang::get('event_ticket_buyers.ref_event_id')),array('class'=>'control-label')) }}	
				</div>
					<div class="col-sm-8">
						{{ Form::text('id', $value = $data->ref_event_id ,array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('id', (Lang::get('event_ticket_buyers.enter_msg').' '.Lang::get('event_ticket_buyers.ref_membership_id')),array('class'=>'control-label')) }}	
				</div>
					<div class="col-sm-8">
						{{ Form::text('id', $value = $data->ref_membership_id ,array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('id', (Lang::get('event_ticket_buyers.enter_msg').' '.Lang::get('event_ticket_buyers.buyer_first_name')),array('class'=>'control-label')) }}	
				</div>
					<div class="col-sm-8">
						{{ Form::text('id', $value = $data->buyer_first_name ,array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('id', (Lang::get('event_ticket_buyers.enter_msg').' '.Lang::get('event_ticket_buyers.buyer_last_name')),array('class'=>'control-label')) }}	
				</div>
					<div class="col-sm-8">
						{{ Form::text('id', $value = $data->buyer_last_name ,array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('id', (Lang::get('event_ticket_buyers.enter_msg').' '.Lang::get('event_ticket_buyers.payment_type')),array('class'=>'control-label')) }}	
				</div>
					<div class="col-sm-8">
						{{ Form::text('id', $value = $data->payment_type ,array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('id', (Lang::get('event_ticket_buyers.enter_msg').' '.Lang::get('event_ticket_buyers.total_tickets')),array('class'=>'control-label')) }}	
				</div>
					<div class="col-sm-8">
						{{ Form::text('id', $value = $data->total_tickets ,array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('id', (Lang::get('event_ticket_buyers.enter_msg').' '.Lang::get('event_ticket_buyers.total_price')),array('class'=>'control-label')) }}	
				</div>
					<div class="col-sm-8">
						{{ Form::text('id', $value = $data->total_price ,array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('id', (Lang::get('event_ticket_buyers.enter_msg').' '.Lang::get('event_ticket_buyers.event_ticket_buyer_stored_datetime')),array('class'=>'control-label')) }}	
				</div>
					<div class="col-sm-8">
						{{ Form::text('id', $value = $data->event_ticket_buyer_stored_datetime ,array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('id', (Lang::get('event_ticket_buyers.enter_msg').' '.Lang::get('event_ticket_buyers.event_ticket_buyer_edited_datetime')),array('class'=>'control-label')) }}	
				</div>
					<div class="col-sm-8">
						{{ Form::text('id', $value = $data->event_ticket_buyer_edited_datetime ,array('class' => 'form-control')) }}
					</div>
				</div>

				
				<br />
					
					
				
				<div class="form-group">
				<label class="control-label ">&nbsp;&nbsp;</label>
				{{ Form::submit(Lang::get('event_ticket_buyers.update_btn_msg'), array('class' => 'btn btn-primary')) }}
				</div>

			{!! Form::close() !!}
			
@endsection			
			