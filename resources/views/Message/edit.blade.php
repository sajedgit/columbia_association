
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
            <div align="right">
                <a href="{{ route('messages.index') }}" class="btn btn-default">Back</a>
            </div>
            <br />
			

			{{ Form::open([ 'method'  => 'post','class'  => '', 'route' => [ 'messages.update', $data->id ] ]) }}
				
				 @csrf
                @method('PATCH')

				<div class="form-group">
				{{ Form::label('id', (Lang::get('messages.enter_msg').' '.Lang::get('messages.id')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->id ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				<div class="form-group">
				{{ Form::label('id', (Lang::get('messages.enter_msg').' '.Lang::get('messages.message_details')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->message_details ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				<div class="form-group">
				{{ Form::label('id', (Lang::get('messages.enter_msg').' '.Lang::get('messages.message_active')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->message_active ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				<div class="form-group">
				{{ Form::label('id', (Lang::get('messages.enter_msg').' '.Lang::get('messages.message_created_datetime')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->message_created_datetime ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				<div class="form-group">
				{{ Form::label('id', (Lang::get('messages.enter_msg').' '.Lang::get('messages.message_edited_datetime')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->message_edited_datetime ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				
				<br />
					
					
				
				<div class="form-group">
				<label class="control-label ">&nbsp;&nbsp;</label>
				{{ Form::submit(Lang::get('messages.update_btn_msg'), array('class' => 'btn btn-primary input-lg col-md-1')) }}
				</div>

			{!! Form::close() !!}
			
@endsection			
			