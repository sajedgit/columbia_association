
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
				{{ Form::label('name', (Lang::get('memberships.edit_msg').' '.Lang::get('memberships.name')),array('class'=>'control-label')) }}
				</div>
					<div class="col-sm-8">
						{{ Form::text('name', $value = $data->name ,array('class' => 'form-control')) }}
					</div>
				</div>
				
				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('username', (Lang::get('memberships.edit_msg').' '.Lang::get('memberships.username')),array('class'=>'control-label')) }}
				</div>
				<div class="col-sm-8">
						{{ Form::text('username', $value = $data->username ,array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('password', (Lang::get('memberships.edit_msg').' '.Lang::get('memberships.password')),array('class'=>'control-label')) }}
				</div>
					<div class="col-sm-8">

                        <input type="password" name="password" value="<?php //echo $data->password;?>" class="form-control">

					</div>
				</div>
				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('password_confirmation', (Lang::get('memberships.edit_msg').' '.Lang::get('memberships.password_confirmation')),array('class'=>'control-label')) }}
				</div>
					<div class="col-sm-8">

                        <input type="password" name="password_confirmation" value="<?php //echo $data->password;?>" class="form-control">

					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('email', (Lang::get('memberships.edit_msg').' '.Lang::get('memberships.email')),array('class'=>'control-label')) }}
				</div>
					<div class="col-sm-8">
						{{ Form::text('email', $value = $data->email ,array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('active', (Lang::get('memberships.edit_msg').' '.Lang::get('memberships.active')),array('class'=>'control-label')) }}
				</div>
					<div class="col-sm-8">
				
						{!! Form::select('active', $status_items, $data->active, ['class' => 'form-control']) !!}
					</div>
				</div>


				<br />



				<div class="form-group">
				<label class="control-label ">&nbsp;&nbsp;</label>
				{{ Form::submit(Lang::get('memberships.update_btn_msg'), array('class' => 'btn btn-primary')) }}
				</div>

			{!! Form::close() !!}

@endsection
