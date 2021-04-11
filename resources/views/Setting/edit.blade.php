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


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">API Key Settings</h1>
    <p class="mb-4"> </p>



    {{ Form::open([ 'method'  => 'post','class'  => 'col-sm-6', 'route' => [ 'settings.update', $data->id ] ]) }}

    @csrf
    @method('PATCH')



    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('admin_email', ('Admin Email '),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('admin_email', $value = $data->admin_email ,array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('membership_price', ('Membership Price'),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::number('membership_price', $value = $data->membership_price ,array('class' => 'form-control')) }}
        </div>
    </div>


    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('url_ios', ('IOS URL '),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::textArea('url_ios', $value = $data->url_ios ,array('class' => 'form-control','rows'=>2)) }}
        </div>
    </div>



    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('url_android', ('Android URL '),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::textArea('url_android', $value = $data->url_android ,array('class' => 'form-control','rows'=>3)) }}
        </div>
    </div>



    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('api_key_ios', ('IOS API Key '),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::textArea('api_key_ios', $value = $data->api_key_ios ,array('class' => 'form-control','rows'=>2)) }}
        </div>
    </div>



    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('api_key_android', ('Android API Key '),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::textArea('api_key_android', $value = $data->api_key_android ,array('class' => 'form-control','rows'=>3)) }}
        </div>
    </div>





    <br/>



    <div class="form-group text-center">
        <label class="control-label ">&nbsp;&nbsp;</label>
        {{ Form::submit(Lang::get('messages.update_btn_msg'), array('class' => 'btn btn-primary')) }}
    </div>



    {!! Form::close() !!}

@endsection
