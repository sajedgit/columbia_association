
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
			<h1 class="h3 mb-2 text-gray-800">{{ __('organize_infos.page_title') }}</h1>
			<p class="mb-4">{{ __('organize_infos.welcome_msg') }}</p>
			
            <div align="right">
                <a href="{{ route('organize_infos.index') }}" class="btn btn-default">Back</a>
            </div>
            <br />
			

			{{ Form::open([ 'method'  => 'post','class'  => 'col-sm-6', 'route' => [ 'organize_infos.update', $data->id ] ]) }}
				
				 @csrf
                @method('PATCH')

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('id', (Lang::get('organize_infos.enter_msg').' '.Lang::get('organize_infos.organize_address')),array('class'=>'control-label')) }}	
				</div>
					<div class="col-sm-8">
						{{ Form::text('id', $value = $data->organize_address ,array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('id', (Lang::get('organize_infos.enter_msg').' '.Lang::get('organize_infos.organize_telephone')),array('class'=>'control-label')) }}	
				</div>
					<div class="col-sm-8">
						{{ Form::text('id', $value = $data->organize_telephone ,array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('id', (Lang::get('organize_infos.enter_msg').' '.Lang::get('organize_infos.organize_email')),array('class'=>'control-label')) }}	
				</div>
					<div class="col-sm-8">
						{{ Form::text('id', $value = $data->organize_email ,array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('id', (Lang::get('organize_infos.enter_msg').' '.Lang::get('organize_infos.organize_facebook')),array('class'=>'control-label')) }}	
				</div>
					<div class="col-sm-8">
						{{ Form::text('id', $value = $data->organize_facebook ,array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('id', (Lang::get('organize_infos.enter_msg').' '.Lang::get('organize_infos.organize_instagram')),array('class'=>'control-label')) }}	
				</div>
					<div class="col-sm-8">
						{{ Form::text('id', $value = $data->organize_instagram ,array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('id', (Lang::get('organize_infos.enter_msg').' '.Lang::get('organize_infos.organize_linkedin')),array('class'=>'control-label')) }}	
				</div>
					<div class="col-sm-8">
						{{ Form::text('id', $value = $data->organize_linkedin ,array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('id', (Lang::get('organize_infos.enter_msg').' '.Lang::get('organize_infos.organize_twitter')),array('class'=>'control-label')) }}	
				</div>
					<div class="col-sm-8">
						{{ Form::text('id', $value = $data->organize_twitter ,array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('id', (Lang::get('organize_infos.enter_msg').' '.Lang::get('organize_infos.organize_info_created_edited_datetime')),array('class'=>'control-label')) }}	
				</div>
					<div class="col-sm-8">
						{{ Form::text('id', $value = $data->organize_info_created_edited_datetime ,array('class' => 'form-control')) }}
					</div>
				</div>

				
				<br />
					
					
				
				<div class="form-group">
				<label class="control-label ">&nbsp;&nbsp;</label>
				{{ Form::submit(Lang::get('organize_infos.update_btn_msg'), array('class' => 'btn btn-primary')) }}
				</div>

			{!! Form::close() !!}
			
@endsection			
			