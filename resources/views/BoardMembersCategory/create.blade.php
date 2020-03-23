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
<h1 class="h3 mb-2 text-gray-800">{{ __('board_members_categories.page_title') }}</h1>
<p class="mb-4">{{ __('board_members_categories.welcome_msg') }}</p>


<div align="right">
	<a href="{{ route('board_members_categories.index') }}" class="btn btn-default">Back</a>
</div>

 
{{ Form::open([ 'method'  => 'post','class'  => 'col-sm-6', 'route' => [ 'board_members_categories.store' ]  ]) }} 

	@csrf

    	<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('id', (Lang::get('board_members_categories.enter_msg').' '.Lang::get('board_members_categories.id')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('board_members_categories.id'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('board_members_category_name', (Lang::get('board_members_categories.enter_msg').' '.Lang::get('board_members_categories.board_members_category_name')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('board_members_categories.board_members_category_name'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('board_members_category_position', (Lang::get('board_members_categories.enter_msg').' '.Lang::get('board_members_categories.board_members_category_position')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('board_members_categories.board_members_category_position'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('board_members_category_active', (Lang::get('board_members_categories.enter_msg').' '.Lang::get('board_members_categories.board_members_category_active')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('board_members_categories.board_members_category_active'))) }}
				</div>
		    </div>
	
		<br />
		
		
		<div class="form-group text-center">
		{{ Form::submit(Lang::get('board_members_categories.submit_btn_msg'), array('class' => 'btn btn-primary')) }}
		 
		</div>

{!! Form::close() !!}

@endsection



	

