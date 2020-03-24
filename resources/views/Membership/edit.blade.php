
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
			<h1 class="h3 mb-2 text-gray-800">{{ __('memberships.page_title') }}</h1>
			<p class="mb-4">{{ __('memberships.welcome_msg') }}</p>

            <div align="right">
                <a href="{{ route('memberships.index') }}" class="btn btn-default">Back</a>
            </div>
            <br />


			{{ Form::open([ 'method'  => 'post','class'  => 'col-sm-6', 'route' => [ 'memberships.update', $data->id ] ]) }}

				 @csrf
                @method('PATCH')



				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('membership_username', (Lang::get('memberships.edit_msg').' '.Lang::get('memberships.membership_username')),array('class'=>'control-label')) }}
				</div>
					<div class="col-sm-8">
						{{ Form::text('membership_username', $value = $data->membership_username ,array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('membership_password_value', (Lang::get('memberships.edit_msg').' '.Lang::get('memberships.membership_password_value')),array('class'=>'control-label')) }}
				</div>
					<div class="col-sm-8">

                        <input type="password" name="membership_password_value" value="<?php echo $data->membership_password_value; ?>" class="form-control">

					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('membership_status', (Lang::get('memberships.edit_msg').' '.Lang::get('memberships.membership_status')),array('class'=>'control-label')) }}
				</div>
					<div class="col-sm-8">
						{{ Form::text('membership_status', $value = $data->membership_status ,array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('membership_expired_date', (Lang::get('memberships.edit_msg').' '.Lang::get('memberships.membership_expired_date')),array('class'=>'control-label')) }}
				</div>
					<div class="col-sm-8">
						{{ Form::text('membership_expired_date', $value = $data->membership_expired_date ,array('id'=>'datepicker1','class' => 'form-control')) }}
					</div>
				</div>


				<br />



				<div class="form-group">
				<label class="control-label ">&nbsp;&nbsp;</label>
				{{ Form::submit(Lang::get('memberships.update_btn_msg'), array('class' => 'btn btn-primary')) }}
				</div>

			{!! Form::close() !!}

@endsection
