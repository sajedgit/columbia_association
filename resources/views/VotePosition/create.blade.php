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
    <h1 class="h3 mb-2 text-gray-800">{{ __('votes_position.page_title') }}</h1>
    <p class="mb-4">{{ __('votes_position.welcome_msg') }}</p>


    <div align="right">
        <a href="{{ route('votes_position.index') }}" class="btn btn-default">Back</a>
    </div>


    {{ Form::open([ 'method'  => 'post','class'  => 'col-sm-6','files'=>'true', 'route' => [ 'votes_position.store' ]  ]) }}

    @csrf

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('vote_id', (Lang::get('votes_position.enter_msg').' '.Lang::get('votes_position.vote_id')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {!! Form::select('vote_id', $items,null,  array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('position_name', (Lang::get('votes_position.enter_msg').' '.Lang::get('votes_position.position_name')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('position_name', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('votes_position.position_name'))) }}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('noc', (Lang::get('votes_position.enter_msg').' '.Lang::get('votes_position.noc')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::number('noc', $value = null ,array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('sort_order', (Lang::get('votes_position.enter_msg').' '.Lang::get('votes_position.sort_order')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::number('sort_order', $value = null ,array('class' => 'form-control')) }}
        </div>
    </div>


    <br/>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('member', (' Candidates '),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">

            {!! Form::select('member[]', $member,null, ['multiple'=>'multiple','class' => 'form-control']) !!}
        </div>
    </div>

    <br/>


    <div class="form-group text-center">
        {{ Form::submit(Lang::get('votes_position.submit_btn_msg'), array('class' => 'btn btn-primary')) }}

    </div>

    {!! Form::close() !!}

@endsection



	

