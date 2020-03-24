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
            {{ Form::label('membership_username', (Lang::get('memberships.enter_msg').' '.Lang::get('memberships.membership_username')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('membership_username', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('memberships.membership_username'))) }}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('membership_password_value', (Lang::get('memberships.enter_msg').' '.Lang::get('memberships.membership_password_value')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::password('membership_password_value' ,array('class' => 'form-control','placeholder'=>Lang::get('memberships.membership_password_value'))) }}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('membership_status', (Lang::get('memberships.enter_msg').' '.Lang::get('memberships.membership_status')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('membership_status', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('memberships.membership_status'))) }}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('membership_expired_date', (Lang::get('memberships.enter_msg').' '.Lang::get('memberships.membership_expired_date')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('membership_expired_date', $value = null ,array('id'=>'datepicker1','class' => 'form-control','placeholder'=>Lang::get('memberships.membership_expired_date'))) }}
        </div>
    </div>




    <br/>


    <div class="form-group text-center">
        {{ Form::submit(Lang::get('memberships.submit_btn_msg'), array('class' => 'btn btn-primary')) }}

    </div>

    {!! Form::close() !!}

@endsection





