
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
                <a href="{{ route('memberships.index') }}" class="btn btn-default">Back</a>
            </div>
            <br />
			

			{{ Form::open([ 'method'  => 'post','class'  => '', 'route' => [ 'memberships.update', $data->id ] ]) }}
				
				 @csrf
                @method('PATCH')

			 

				<div class="form-group">
				{{ Form::label('membership_username', (Lang::get('memberships.enter_msg').' '.Lang::get('memberships.membership_username')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('membership_username', $value = $data->membership_username ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				<div class="form-group">
				{{ Form::label('membership_password_value', (Lang::get('memberships.enter_msg').' '.Lang::get('memberships.membership_password_value')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('membership_password_value', $value = $data->membership_password_value ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				<div class="form-group">
				{{ Form::label('membership_status', (Lang::get('memberships.enter_msg').' '.Lang::get('memberships.membership_status')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('membership_status', $value = $data->membership_status ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				 

				
				<br />
					
					
				
				<div class="form-group">
				<label class="control-label ">&nbsp;&nbsp;</label>
				{{ Form::submit(Lang::get('memberships.update_btn_msg'), array('class' => 'btn btn-primary input-lg col-md-1')) }}
				</div>

			{!! Form::close() !!}
			
@endsection			
			