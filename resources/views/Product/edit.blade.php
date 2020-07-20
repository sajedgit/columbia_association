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
    <h1 class="h3 mb-2 text-gray-800">{{ __('products.page_title') }}</h1>
    <p class="mb-4">{{ __('products.welcome_msg') }}</p>

    <div align="right">
        <a href="{{ route('products.index') }}" class="btn btn-default">Back</a>
    </div>
    <br/>


    {{ Form::open([ 'method'  => 'post','class'  => 'col-sm-6','files'=>'true', 'route' => [ 'products.update', $data->id ] ]) }}

    @csrf
    @method('PATCH')



    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('product_name', (Lang::get('products.enter_msg').' '.Lang::get('products.product_name')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('product_name', $value = $data->product_name ,array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('product_description', (Lang::get('products.enter_msg').' '.Lang::get('products.product_description')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('product_description', $value = $data->product_description ,array('class' => 'form-control')) }}
        </div>
    </div>



    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('price', (Lang::get('products.enter_msg').' '.Lang::get('products.price')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('price', $value = $data->price ,array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('stock', (Lang::get('products.enter_msg').' '.Lang::get('products.stock')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('stock', $value = $data->stock ,array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('product_photo', (Lang::get('products.enter_msg').' '.Lang::get('products.photo')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">

            {{ Form::file('product_photo', array('class' => 'form-control')) }}
            <img src="{{ asset('public/images/product/'.$data->photo) }}" class="img-thumbnail" width="100"/>
            <input type="hidden" name="hidden_image" value="{{ $data->photo }}"/>

        </div>
    </div>




    <br/>



    <div class="form-group">
        <label class="control-label ">&nbsp;&nbsp;</label>
        {{ Form::submit(Lang::get('products.update_btn_msg'), array('class' => 'btn btn-primary')) }}
    </div>

    {!! Form::close() !!}

@endsection			
			