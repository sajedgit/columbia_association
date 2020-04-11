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
    <h1 class="h3 mb-2 text-gray-800">{{ __('memberships.page_title') }}</h1>
    <p class="mb-4">{{ __('memberships.welcome_msg') }}</p>


    <div align="right">
        <a href="{{ route('memberships.index') }}" class="btn btn-default">Back</a>
    </div>


    {{ Form::open([ 'method'  => 'post','class'  => 'col-sm-6', 'route' => [ 'memberships.store' ]  ]) }}

    @csrf


    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('name', (Lang::get('memberships.enter_msg').' '.Lang::get('memberships.name')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('name', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('memberships.name'))) }}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('username', (Lang::get('memberships.enter_msg').' '.Lang::get('memberships.username')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('username' , $value = null,array('class' => 'form-control','placeholder'=>Lang::get('memberships.username'))) }}
        </div>
    </div>
	
	<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('password', (Lang::get('memberships.enter_msg').' '.Lang::get('memberships.password')),array('class'=>'control-label')) }}
				</div>
				<div class="col-sm-8">

					<input type="password" name="password" value="{{ __('memberships.password') }}" class="form-control">

				</div>
	</div>
	<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('password_confirmation', (Lang::get('memberships.enter_msg').' '.Lang::get('memberships.password_confirmation')),array('class'=>'control-label')) }}
				</div>
				<div class="col-sm-8">

					<input type="password" name="password_confirmation" value="{{ __('memberships.password_confirmation') }}" class="form-control">

				</div>
	</div>
	
    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('email', (Lang::get('memberships.enter_msg').' '.Lang::get('memberships.email')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('email', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('memberships.email'))) }}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('active', (Lang::get('memberships.enter_msg').' '.Lang::get('memberships.active')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {!! Form::select('active', $status_items,'Select', ['class' => 'form-control']) !!}
        </div>
    </div>




    <br/>


    <div class="form-group text-center">
        {{ Form::submit(Lang::get('memberships.submit_btn_msg'), array('class' => 'btn btn-primary')) }}

    </div>

    {!! Form::close() !!}

@endsection





