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
    <h1 class="h3 mb-2 text-gray-800">{{ __('products.page_title') }}</h1>
    <p class="mb-4">{{ __('products.welcome_msg') }}</p>


    <div align="right">
        <a href="{{ route('products.index') }}" class="btn btn-default">Back</a>
    </div>


    {{ Form::open([ 'method'  => 'post','class'  => 'col-sm-6','files'=>'true', 'route' => [ 'products.store' ]  ]) }}

    @csrf


    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('product_name', (Lang::get('products.enter_msg').' '.Lang::get('products.product_name')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('product_name', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('products.product_name'))) }}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('product_description', (Lang::get('products.enter_msg').' '.Lang::get('products.product_description')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::textArea('product_description', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('products.product_description'))) }}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('price', (Lang::get('products.enter_msg').' '.Lang::get('products.price')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('price', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('products.price'))) }}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('stock', (Lang::get('products.enter_msg').' '.Lang::get('products.stock')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('stock', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('products.stock'))) }}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('product_photo', (Lang::get('products.enter_msg').' '.Lang::get('products.photo')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::file('product_photo',array('class'=>'form-control')) }}
        </div>
    </div>



    <br/>


    <div class="form-group text-center">
        {{ Form::submit(Lang::get('products.submit_btn_msg'), array('class' => 'btn btn-primary')) }}

    </div>

    {!! Form::close() !!}

@endsection



	

