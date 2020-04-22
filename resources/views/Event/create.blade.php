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
    <h1 class="h3 mb-2 text-gray-800">{{ __('events.page_title') }}</h1>
    <p class="mb-4">{{ __('events.welcome_msg') }}</p>


    <div align="right">
        <a href="{{ route('events.index') }}" class="btn btn-default">Back</a>
    </div>


    {{ Form::open([ 'method'  => 'post','class'  => 'col-sm-6','files'=>'true', 'route' => [ 'events.store' ]  ]) }}

    @csrf


    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('event_title', (Lang::get('events.enter_msg').' '.Lang::get('events.event_title')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('event_title', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('events.event_title'))) }}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('event_details', (Lang::get('events.enter_msg').' '.Lang::get('events.event_details')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('event_details', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('events.event_details'))) }}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('event_venue', (Lang::get('events.enter_msg').' '.Lang::get('events.event_venue')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('event_venue', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('events.event_venue'))) }}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('event_flyer_location', (' Upload '.Lang::get('events.event_flyer_location')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::file('event_flyer_location', array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('event_starting_date', (Lang::get('events.enter_msg').' '.Lang::get('events.event_starting_date')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('event_starting_date', $value = null ,array('id'=>'datepicker1','class' => 'form-control','placeholder'=>Lang::get('events.event_starting_date'))) }}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('event_starting_time', (Lang::get('events.enter_msg').' '.Lang::get('events.event_starting_time')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('event_starting_time', $value = null ,array('id'=>'timepicker1','class' => 'form-control','placeholder'=>Lang::get('events.event_starting_time'))) }}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('event_ending_time', (Lang::get('events.enter_msg').' '.Lang::get('events.event_ending_time')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('event_ending_time', $value = null ,array('id'=>'timepicker2','class' => 'form-control','placeholder'=>Lang::get('events.event_ending_time'))) }}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('event_ticket_price', (Lang::get('events.enter_msg').' '.Lang::get('events.event_ticket_price')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('event_ticket_price', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('events.event_ticket_price'))) }}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('event_total_seat', (Lang::get('events.enter_msg').' '.Lang::get('events.event_total_seat')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('event_total_seat', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('events.event_total_seat'))) }}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('event_active', (Lang::get('events.enter_msg').' '.Lang::get('events.event_active')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {!! Form::select('event_active', $status_items,'Select', ['class' => 'form-control']) !!}
        </div>
    </div>



    <br/>


    <div class="form-group text-center">
        {{ Form::submit(Lang::get('events.submit_btn_msg'), array('class' => 'btn btn-primary')) }}

    </div>

    {!! Form::close() !!}

@endsection





