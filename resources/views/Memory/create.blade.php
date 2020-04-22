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
    <h1 class="h3 mb-2 text-gray-800">{{ __('memories.page_title') }}</h1>
    <p class="mb-4">{{ __('memories.welcome_msg') }}</p>


    <div align="right">
        <a href="{{ route('memories.index') }}" class="btn btn-default">Back</a>
    </div>


    {{ Form::open([ 'method'  => 'post','class'  => 'col-sm-6','files'=>'true', 'route' => [ 'memories.store' ]  ]) }}

    @csrf


    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('memories_name', (Lang::get('memories.enter_msg').' '.Lang::get('memories.memories_name')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('memories_name', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('memories.memories_name'))) }}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('memories_details', (Lang::get('memories.enter_msg').' '.Lang::get('memories.memories_details')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::textarea('memories_details', $value = null ,array('rows'=>'4','class' => 'form-control','placeholder'=>Lang::get('memories.memories_details'))) }}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('memories_thumb', (Lang::get('memories.upload_msg').' '.Lang::get('memories.memories_thumb')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
          {{ Form::file('memories_thumb',array('class'=>'form-control')) }}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('memories_active', (Lang::get('memories.enter_msg').' '.Lang::get('memories.memories_active')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {!! Form::select('memories_active', $status_items,'Select', ['class' => 'form-control']) !!}
        </div>
    </div>

    <br/>


    <div class="form-group text-center">
        {{ Form::submit(Lang::get('memories.submit_btn_msg'), array('class' => 'btn btn-primary')) }}

    </div>

    {!! Form::close() !!}

@endsection





