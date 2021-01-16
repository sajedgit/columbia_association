@extends('parent')

@section('main')

    <style>

        /*-----loader css -----*/


        /* ALL LOADERS */

        .loader{
            width: 100px;
            height: 100px;
            border-radius: 100%;
            position: relative;
            margin: 0 auto;
        }

        /* LOADER 1 */

        #loader-1:before, #loader-1:after{
            content: "";
            position: absolute;
            top: -10px;
            left: -10px;
            width: 100%;
            height: 100%;
            border-radius: 100%;
            border: 10px solid transparent;
            border-top-color: #3498db;
        }

        #loader-1:before{
            z-index: 100;
            animation: spin 1s infinite;
        }

        #loader-1:after{
            border: 10px solid #ccc;
        }

        @keyframes spin{
            0%{
                -webkit-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100%{
                -webkit-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }


        /*-----loader css -----*/


    </style>

    <div class="form-group text-center loader_class" style="display: none;">
        <div class="text-center">
            <div class="loader" id="loader-1"></div>
        </div>

    </div>

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
    <h1 class="h3 mb-2 text-gray-800">{{ __('events.page_title') }}</h1>
    <p class="mb-4">{{ __('events.welcome_msg') }}</p>

    <div align="right">
        <a href="{{ route('events.index') }}" class="btn btn-default">Back</a>
    </div>
    <br/>


    {{ Form::open([ 'method'  => 'post','class'  => 'col-sm-6','files'=>'true', 'route' => [ 'events.update', $data->id ] ]) }}

    @csrf
    @method('PATCH')



    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('event_title', (Lang::get('events.edit_msg').' '.Lang::get('events.event_title')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('event_title', $value = $data->event_title ,array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('event_details', (Lang::get('events.edit_msg').' '.Lang::get('events.event_details')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('event_details', $value = $data->event_details ,array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('event_venue', (Lang::get('events.edit_msg').' '.Lang::get('events.event_venue')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('event_venue', $value = $data->event_venue ,array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('event_flyer_location', (' Update '.Lang::get('events.event_flyer_location')),array('class'=>'control-label')) }}
        </div>

        <div class="col-sm-8">
            {{ Form::file('event_flyer_location', array('class' => 'form-control')) }}
            <img src="{{ URL::to('/') }}/public/images/{{ $data->event_flyer_location }}" class="img-thumbnail" width="100"/>
            <input type="hidden" name="hidden_image" value="{{ $data->event_flyer_location }}"/>

        </div>
    </div>



    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('event_starting_date', (Lang::get('events.edit_msg').' '.Lang::get('events.event_starting_date')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('event_starting_date', $value = $data->event_starting_date ,array('id'=>'datepicker1','class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('event_starting_time', (Lang::get('events.edit_msg').' '.Lang::get('events.event_starting_time')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::time('event_starting_time', $value = $data->event_starting_time ,array('id'=>'timepicker1','class' => 'form-control')) }}
        </div>
    </div>


    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('event_ending_date', (Lang::get('events.edit_msg').' '.Lang::get('events.event_ending_date')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('event_ending_date', $value = $data->event_ending_date ,array('id'=>'datepicker2','class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('event_ending_time', (Lang::get('events.edit_msg').' '.Lang::get('events.event_ending_time')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::time('event_ending_time', $value = $data->event_ending_time ,array('id'=>'timepicker2','class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('event_ticket_price', (Lang::get('events.edit_msg').' '.Lang::get('events.event_ticket_price')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('event_ticket_price', $value = $data->event_ticket_price ,array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('event_ticket_price_children', (Lang::get('events.edit_msg').' '.Lang::get('events.event_ticket_price_children')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('event_ticket_price_children', $value = $data->event_ticket_price_children ,array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('event_total_seat', (Lang::get('events.edit_msg').' '.Lang::get('events.event_total_seat')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('event_total_seat', $value = $data->event_total_seat ,array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('event_active', (Lang::get('events.edit_msg').' '.Lang::get('events.event_active')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {!! Form::select('event_active', $status_items,$data->event_active, ['class' => 'form-control']) !!}
        </div>
    </div>





    <br/>



    <div class="form-group text-center loader_class" style="display: none;">
        <div class="text-center">
            <div class="loader" id="loader-1"></div>
        </div>

    </div>



    <div class="form-group">
        <label class="control-label ">&nbsp;&nbsp;</label>
        {{ Form::submit(Lang::get('events.update_btn_msg'), array('class' => 'btn btn-primary event_create_btn')) }}
    </div>

    {!! Form::close() !!}

@endsection
