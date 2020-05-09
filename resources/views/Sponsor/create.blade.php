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
    <h1 class="h3 mb-2 text-gray-800">{{ __('sponsors.page_title') }}</h1>
    <p class="mb-4">{{ __('sponsors.welcome_msg') }}</p>


    <div align="right">
        <a href="{{ route('sponsors.index') }}" class="btn btn-default">Back</a>
    </div>


    {{ Form::open([ 'method'  => 'post','class'  => 'col-sm-6','files'=>'true', 'route' => [ 'sponsors.store' ]  ]) }}

    @csrf


    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('sponsor_name', (Lang::get('sponsors.enter_msg').' '.Lang::get('sponsors.sponsor_name')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('sponsor_name', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('sponsors.sponsor_name'))) }}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('sponsor_details', (Lang::get('sponsors.enter_msg').' '.Lang::get('sponsors.sponsor_details')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::textArea('sponsor_details', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('sponsors.sponsor_details'))) }}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('sponsor_address', (Lang::get('sponsors.enter_msg').' '.Lang::get('sponsors.sponsor_address')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('sponsor_address', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('sponsors.sponsor_address'))) }}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('sponsor_email', (Lang::get('sponsors.enter_msg').' '.Lang::get('sponsors.sponsor_email')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('sponsor_email', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('sponsors.sponsor_email'))) }}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('sponsor_website', (Lang::get('sponsors.enter_msg').' '.Lang::get('sponsors.sponsor_website')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('sponsor_website', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('sponsors.sponsor_website'))) }}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('sponsor_logo_photo', (Lang::get('sponsors.enter_msg').' '.Lang::get('sponsors.sponsor_logo_photo')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::file('sponsor_logo_photo',array('class'=>'form-control')) }}
        </div>
    </div>



    <br/>


    <div class="form-group text-center">
        {{ Form::submit(Lang::get('sponsors.submit_btn_msg'), array('class' => 'btn btn-primary')) }}

    </div>

    {!! Form::close() !!}

@endsection



	

