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
    <h1 class="h3 mb-2 text-gray-800">{{ __('candidates.page_title') }}</h1>
    <p class="mb-4">{{ __('candidates.welcome_msg') }}</p>


    <div align="right">
        <a href="{{ route('candidates.index') }}" class="btn btn-default">Back</a>
    </div>


    {{ Form::open([ 'method'  => 'post','class'  => 'col-sm-6','files'=>'true', 'route' => [ 'candidates.store' ]  ]) }}

    @csrf





    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('vote_id', (Lang::get('candidates.enter_msg').' '.Lang::get('candidates.vote_id')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {!! Form::select('vote_id', $vote,null,  array('class' => 'form-control')) !!}
         </div>
    </div>


    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('vote_position_id', (Lang::get('candidates.enter_msg').' '.Lang::get('candidates.vote_position_id')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {!! Form::select('vote_position_id', $position,null,  array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('user_id', (Lang::get('candidates.enter_msg').' '.Lang::get('candidates.user_id')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('user_id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('candidates.user_id'))) }}
        </div>
    </div>






    <br/>


    <div class="form-group text-center">
        {{ Form::submit(Lang::get('candidates.submit_btn_msg'), array('class' => 'btn btn-primary')) }}

    </div>

    {!! Form::close() !!}

@endsection





