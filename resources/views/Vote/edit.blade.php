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

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ __('votes.page_title') }}</h1>
    <p class="mb-4">{{ __('votes.welcome_msg') }}</p>

    <div align="right">
        <a href="{{ route('votes.index') }}" class="btn btn-default">Back</a>
    </div>
    <br/>


    {{ Form::open([ 'method'  => 'post','class'  => 'col-sm-6','files'=>'true', 'route' => [ 'votes.update', $data->id ] ]) }}

    @csrf
    @method('PATCH')



    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('vote_name', (Lang::get('votes.enter_msg').' '.Lang::get('votes.vote_name')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('vote_name', $value = $data->vote_name ,array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('description', (Lang::get('votes.enter_msg').' '.Lang::get('votes.description')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">

            {{ Form::textArea('description', $value = $data->description ,array('class' => 'form-control')) }}

        </div>
    </div>



    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('voting_date', (Lang::get('votes.enter_msg').' '.Lang::get('votes.voting_date')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('voting_date', $value = $data->voting_date ,array('id'=>'datepicker1','class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('start_time', (Lang::get('votes.enter_msg').' '.Lang::get('votes.start_time')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('start_time', $value = $data->start_time ,array('id'=>'timepicker1','class' => 'form-control')) }}
        </div>
    </div>


    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('end_time', (Lang::get('votes.enter_msg').' '.Lang::get('votes.end_time')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('end_time', $value = $data->end_time ,array('id'=>'timepicker2','class' => 'form-control')) }}
        </div>
    </div>






    <br/>



    <div class="form-group">
        <label class="control-label ">&nbsp;&nbsp;</label>
        {{ Form::submit(Lang::get('votes.update_btn_msg'), array('class' => 'btn btn-primary')) }}
    </div>

    {!! Form::close() !!}

@endsection			
			