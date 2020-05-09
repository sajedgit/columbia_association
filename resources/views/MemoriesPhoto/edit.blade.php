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
    <h1 class="h3 mb-2 text-gray-800">{{ __('memories_photos.page_title') }}</h1>
    <p class="mb-4">{{ __('memories_photos.welcome_msg') }}</p>

    <div align="right">
        <a href="{{ route('memories_photos.index') }}" class="btn btn-default">Back</a>
    </div>
    <br/>


    {{ Form::open([ 'method'  => 'post','class'  => 'col-sm-6', 'route' => [ 'memories_photos.update', $data->id ] ]) }}

    @csrf
    @method('PATCH')

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('id', (Lang::get('memories_photos.enter_msg').' '.Lang::get('memories_photos.id')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('id', $value = $data->id ,array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('id', (Lang::get('memories_photos.enter_msg').' '.Lang::get('memories_photos.ref_memories_id')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('id', $value = $data->ref_memories_id ,array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('id', (Lang::get('memories_photos.enter_msg').' '.Lang::get('memories_photos.memories_photo_location')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('id', $value = $data->memories_photo_location ,array('class' => 'form-control')) }}
        </div>
    </div>






    <br/>



    <div class="form-group">
        <label class="control-label ">&nbsp;&nbsp;</label>
        {{ Form::submit(Lang::get('memories_photos.update_btn_msg'), array('class' => 'btn btn-primary')) }}
    </div>

    {!! Form::close() !!}

@endsection			
			