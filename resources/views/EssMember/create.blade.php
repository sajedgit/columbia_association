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
    <h1 class="h3 mb-2 text-gray-800">{{ __('ess_members.page_title') }}</h1>
    <p class="mb-4">{{ __('ess_members.welcome_msg') }}</p>


    <div align="right">
        <a href="{{ route('ess_members.index') }}" class="btn btn-default">Back</a>
    </div>


    {{ Form::open([ 'method'  => 'post','class'  => 'col-sm-6', 'route' => [ 'ess_members.store' ]  ]) }}

    @csrf

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('type', (Lang::get('ess_members.select_msg').' '.Lang::get('ess_members.type')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {!! Form::select('type', $type,'Select', ['class' => 'form-control']) !!}
        </div>
    </div>


    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('name', (Lang::get('ess_members.enter_msg').' '.Lang::get('ess_members.name')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('name', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('ess_members.name'))) }}
        </div>
    </div>


    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('email', (Lang::get('ess_members.enter_msg').' '.Lang::get('ess_members.email')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('email', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('ess_members.email'))) }}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('active', (Lang::get('ess_members.select_msg').' '.Lang::get('ess_members.active')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {!! Form::select('active', $status_items,'Select', ['class' => 'form-control']) !!}
        </div>
    </div>

    <br/>


    <div class="form-group text-center">
        {{ Form::submit(Lang::get('ess_members.submit_btn_msg'), array('class' => 'btn btn-primary')) }}

    </div>

    {!! Form::close() !!}

@endsection





