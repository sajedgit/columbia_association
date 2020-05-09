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
    <h1 class="h3 mb-2 text-gray-800">{{ __('sponsors.page_title') }}</h1>
    <p class="mb-4">{{ __('sponsors.welcome_msg') }}</p>

    <div align="right">
        <a href="{{ route('sponsors.index') }}" class="btn btn-default">Back</a>
    </div>
    <br/>


    {{ Form::open([ 'method'  => 'post','class'  => 'col-sm-6','files'=>'true', 'route' => [ 'sponsors.update', $data->id ] ]) }}

    @csrf
    @method('PATCH')



    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('id', (Lang::get('sponsors.enter_msg').' '.Lang::get('sponsors.sponsor_name')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('sponsor_name', $value = $data->sponsor_name ,array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('id', (Lang::get('sponsors.enter_msg').' '.Lang::get('sponsors.sponsor_details')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('sponsor_details', $value = $data->sponsor_details ,array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('id', (Lang::get('sponsors.enter_msg').' '.Lang::get('sponsors.sponsor_address')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::textArea('sponsor_address', $value = $data->sponsor_address ,array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('id', (Lang::get('sponsors.enter_msg').' '.Lang::get('sponsors.sponsor_email')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('sponsor_email', $value = $data->sponsor_email ,array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('id', (Lang::get('sponsors.enter_msg').' '.Lang::get('sponsors.sponsor_website')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('sponsor_website', $value = $data->sponsor_website ,array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('id', (Lang::get('sponsors.enter_msg').' '.Lang::get('sponsors.sponsor_logo_photo')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">

            {{ Form::file('sponsor_logo_photo', array('class' => 'form-control')) }}
            <img src="{{ asset('public/images/sponsor/'.$data->sponsor_logo_photo) }}" class="img-thumbnail" width="100"/>
            <input type="hidden" name="hidden_image" value="{{ $data->sponsor_logo_photo }}"/>

        </div>
    </div>




    <br/>



    <div class="form-group">
        <label class="control-label ">&nbsp;&nbsp;</label>
        {{ Form::submit(Lang::get('sponsors.update_btn_msg'), array('class' => 'btn btn-primary')) }}
    </div>

    {!! Form::close() !!}

@endsection			
			