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

    @include('partials.tinymce_editor')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ __('messages.page_title') }}</h1>
    <p class="mb-4">{{ __('messages.welcome_msg') }}</p>


    <div align="right">
        <a href="{{ route('messages.index') }}" class="btn btn-default">Back</a>
    </div>


    {{ Form::open([ 'method'  => 'post','class'  => 'col-md-12', 'route' => [ 'messages.store' ]  ]) }}

    @csrf


    <div class="form-group row">
        <div class="col-md-12 mb-3 mb-sm-0">
            {{ Form::label('message_details', (Lang::get('messages.enter_msg').' '.Lang::get('messages.message_details')),array('class'=>'control-label')) }}
        </div>
        <div class="col-md-12">
            <textarea class="form-control" placeholder="Details" name="message_details" cols="50" rows="15" id="">{{ Lang::get('messages.message_details') }}</textarea>
       </div>
    </div>


    <br/>


    <div class="form-group text-center">
        {{ Form::submit(Lang::get('messages.submit_btn_msg'), array('class' => 'btn btn-primary')) }}

    </div>

    {!! Form::close() !!}

@endsection





