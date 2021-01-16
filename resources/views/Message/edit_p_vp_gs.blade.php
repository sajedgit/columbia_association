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

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @include('partials.tinymce_editor')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ __('messages.page_title') }}</h1>
    <p class="mb-4">{{ __('messages.welcome_msg') }}</p>

    <div align="right">
        <a href="{{ route('messages.index') }}" class="btn btn-default">Back</a>
    </div>
    <br/>


    {{ Form::open([ 'method'  => 'post','class'  => 'col-sm-12', 'route' => [ 'messages_update' ] ]) }}

    @csrf



    <div class="form-group row">
        <div class="col-sm-1">
            {{ Form::label('title', (' Title '),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-11">
            {{ Form::text('title', $value = $data->title ,array('class' => 'form-control')) }}
        </div>
    </div>


    <div class="form-group row">
        <input type="hidden" name="table_name" value="<?php echo $table; ?>">
        <input type="hidden" name="url" value="<?php echo $url; ?>">
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            {{ Form::label('description', (' Message '),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-12">
            {{ Form::textArea('description', $value = $data->description ,array('class' => 'form-control','rows' => 15,'cols' => 50)) }}
        </div>
    </div>




    <br/>



    <div class="form-group text-center">
        <label class="control-label ">&nbsp;&nbsp;</label>
        {{ Form::submit(Lang::get('messages.update_btn_msg'), array('class' => 'btn btn-primary')) }}
    </div>



    {!! Form::close() !!}

@endsection
