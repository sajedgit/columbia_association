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
    <h1 class="h3 mb-2 text-gray-800">{{ __('memories_photos.page_title') }}</h1>
    <p class="mb-4">{{ __('memories_photos.welcome_msg') }}</p>


    <div align="right">
        <a href="{{ route('memories_photos.index') }}" class="btn btn-default">Back</a>
    </div>


    {{ Form::open([ 'method'  => 'post','class'  => 'col-sm-6','files'=>'true', 'route' => [ 'memories_photos.store' ]  ]) }}

    @csrf


    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('ref_memories_id', (Lang::get('memories_photos.enter_msg').' '.Lang::get('memories_photos.ref_memories_id')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {!! Form::select('ref_memories_id', $items,null,  array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('memories_photo_location', (Lang::get('memories_photos.enter_msg').' '.Lang::get('memories_photos.memories_photo_location')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            <input class="form-control" type="file" name="file[]" id="file" accept="image/*" multiple/>
        </div>
    </div>


    <br/>


    <div class="form-group text-center">
        {{ Form::submit(Lang::get('memories_photos.submit_btn_msg'), array('class' => 'btn btn-primary')) }}

    </div>

    {!! Form::close() !!}

    <div class="form-group row">
        <div class="progress">
            <div class="progress-bar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                0%
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div id="success" class="row text-center">

        </div>
    </div>






@endsection

