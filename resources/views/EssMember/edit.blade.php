
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
			<h1 class="h3 mb-2 text-gray-800">{{ __('ess_members.page_title') }}</h1>
			<p class="mb-4">{{ __('ess_members.welcome_msg') }}</p>

            <div align="right">
                <a href="{{ route('ess_members.index') }}" class="btn btn-default">Back</a>
            </div>
            <br />


			{{ Form::open([ 'method'  => 'post','class'  => 'col-sm-6', 'files'=>'true','route' => [ 'ess_members.update', $data->id ] ]) }}

				 @csrf
                @method('PATCH')



			<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
					{{ Form::label('type', (Lang::get('ess_members.edit_msg').' '.Lang::get('ess_members.type')),array('class'=>'control-label')) }}
				</div>
				<div class="col-sm-8">

					{!! Form::select('type', $type, $data->type, ['class' => 'form-control']) !!}
				</div>
			</div>


				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('name', (Lang::get('ess_members.edit_msg').' '.Lang::get('ess_members.name')),array('class'=>'control-label')) }}
				</div>
					<div class="col-sm-8">
						{{ Form::text('name', $value = $data->name ,array('class' => 'form-control')) }}
					</div>
				</div>




				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('email', (Lang::get('ess_members.edit_msg').' '.Lang::get('ess_members.email')),array('class'=>'control-label')) }}
				</div>
					<div class="col-sm-8">
						{{ Form::text('email', $value = $data->email ,array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('active', (Lang::get('ess_members.edit_msg').' '.Lang::get('ess_members.active')),array('class'=>'control-label')) }}
				</div>
					<div class="col-sm-8">

                         {!! Form::select('active', $status_items, $data->active, ['class' => 'form-control']) !!}
					</div>
				</div>


				<br />



				<div class="form-group">
				<label class="control-label ">&nbsp;&nbsp;</label>
				{{ Form::submit(Lang::get('ess_members.update_btn_msg'), array('class' => 'btn btn-primary')) }}
				</div>

			{!! Form::close() !!}

@endsection
