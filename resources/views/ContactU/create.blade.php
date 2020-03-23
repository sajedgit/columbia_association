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
<h1 class="h3 mb-2 text-gray-800">{{ __('contact_us.page_title') }}</h1>
<p class="mb-4">{{ __('contact_us.welcome_msg') }}</p>


<div align="right">
	<a href="{{ route('contact_us.index') }}" class="btn btn-default">Back</a>
</div>

 
{{ Form::open([ 'method'  => 'post','class'  => 'col-sm-6', 'route' => [ 'contact_us.store' ]  ]) }} 

	@csrf

    	<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('id', (Lang::get('contact_us.enter_msg').' '.Lang::get('contact_us.id')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('contact_us.id'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('ref_membership_id', (Lang::get('contact_us.enter_msg').' '.Lang::get('contact_us.ref_membership_id')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('contact_us.ref_membership_id'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('contact_us_subject', (Lang::get('contact_us.enter_msg').' '.Lang::get('contact_us.contact_us_subject')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('contact_us.contact_us_subject'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('contact_us_details', (Lang::get('contact_us.enter_msg').' '.Lang::get('contact_us.contact_us_details')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('contact_us.contact_us_details'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('contact_us_seen', (Lang::get('contact_us.enter_msg').' '.Lang::get('contact_us.contact_us_seen')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('contact_us.contact_us_seen'))) }}
				</div>
		    </div>
		<div class="form-group row">
		    <div class="col-sm-4 mb-3 mb-sm-0">
			{{ Form::label('contact_us_created_date_time', (Lang::get('contact_us.enter_msg').' '.Lang::get('contact_us.contact_us_created_date_time')),array('class'=>'control-label')) }}
	        </div>
				<div class="col-sm-8">
					{{ Form::text('id', $value = null ,array('class' => 'form-control','placeholder'=>Lang::get('contact_us.contact_us_created_date_time'))) }}
				</div>
		    </div>
	
		<br />
		
		
		<div class="form-group text-center">
		{{ Form::submit(Lang::get('contact_us.submit_btn_msg'), array('class' => 'btn btn-primary')) }}
		 
		</div>

{!! Form::close() !!}

@endsection



	

