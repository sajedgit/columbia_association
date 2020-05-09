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
    <h1 class="h3 mb-2 text-gray-800">{{ __('messages.page_title') }}</h1>
    <p class="mb-4">{{ __('messages.welcome_msg') }}</p>


    <div align="right">
        <a href="{{ route('messages.index') }}" class="btn btn-default">Back</a>
    </div>


    {{ Form::open([ 'method'  => 'post','class'  => 'col-sm-6', 'route' => [ 'messages.store' ]  ]) }}

    @csrf


    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('message_details', (Lang::get('messages.enter_msg').' '.Lang::get('messages.message_details')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::textArea('message_details', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('messages.message_details'))) }}
        </div>
    </div>


    <br/>


    <div class="form-group text-center">
        {{ Form::submit(Lang::get('messages.submit_btn_msg'), array('class' => 'btn btn-primary')) }}

    </div>

    {!! Form::close() !!}

@endsection



	

