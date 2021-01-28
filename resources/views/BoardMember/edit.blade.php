
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
			<h1 class="h3 mb-2 text-gray-800">{{ __('board_members.page_title') }}</h1>
			<p class="mb-4">{{ __('board_members.welcome_msg') }}</p>

            <div align="right">
                <a href="{{ route('board_members.index') }}" class="btn btn-default">Back</a>
            </div>
            <br />


			{{ Form::open([ 'method'  => 'post','class'  => 'col-sm-6', 'files'=>'true','route' => [ 'board_members.update', $data->id ] ]) }}

				 @csrf
                @method('PATCH')



				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('ref_board_members_category_id', (Lang::get('board_members.edit_msg').' '.Lang::get('board_members.ref_board_members_category_id')),array('class'=>'control-label')) }}
				</div>
					<div class="col-sm-8">

                        {!! Form::select('ref_board_members_category_id', $items, $data->ref_board_members_category_id, ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('board_members_first_name', (Lang::get('board_members.edit_msg').' '.Lang::get('board_members.board_members_first_name')),array('class'=>'control-label')) }}
				</div>
					<div class="col-sm-8">
						{{ Form::text('board_members_first_name', $value = $data->board_members_first_name ,array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('board_members_last_name', (Lang::get('board_members.edit_msg').' '.Lang::get('board_members.board_members_last_name')),array('class'=>'control-label')) }}
				</div>
					<div class="col-sm-8">
						{{ Form::text('board_members_last_name', $value = $data->board_members_last_name ,array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('bio', (Lang::get('board_members.edit_msg').' Bio '),array('class'=>'control-label')) }}
				</div>
					<div class="col-sm-8">
						{{ Form::textArea('bio', $value = $data->bio ,array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('board_members_image_location', (Lang::get('board_members.edit_msg').' '.Lang::get('board_members.board_members_image_location')),array('class'=>'control-label')) }}
				</div>
					<div class="col-sm-8">
					{{ Form::file('board_members_image_location', array('class' => 'form-control')) }}
                       <img src="{{ URL::to('/') }}/public/images/{{ $data->board_members_image_location }}" class="img-thumbnail" width="100" />
                                              <input type="hidden" name="hidden_image" value="{{ $data->board_members_image_location }}" />

					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('board_member_designation', (Lang::get('board_members.edit_msg').' '.Lang::get('board_members.board_member_designation')),array('class'=>'control-label')) }}
				</div>
					<div class="col-sm-8">
						{{ Form::text('board_member_designation', $value = $data->board_member_designation ,array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('board_members_email_address', (Lang::get('board_members.edit_msg').' '.Lang::get('board_members.board_members_email_address')),array('class'=>'control-label')) }}
				</div>
					<div class="col-sm-8">
						{{ Form::text('board_members_email_address', $value = $data->board_members_email_address ,array('class' => 'form-control')) }}
					</div>
				</div>

				<div class="form-group row">
				<div class="col-sm-4 mb-3 mb-sm-0">
				{{ Form::label('board_members_active', (Lang::get('board_members.edit_msg').' '.Lang::get('board_members.board_members_active')),array('class'=>'control-label')) }}
				</div>
					<div class="col-sm-8">

                         {!! Form::select('board_members_active', $status_items, $data->ref_board_members_category_id, ['class' => 'form-control']) !!}
					</div>
				</div>


				<br />



				<div class="form-group">
				<label class="control-label ">&nbsp;&nbsp;</label>
				{{ Form::submit(Lang::get('board_members.update_btn_msg'), array('class' => 'btn btn-primary')) }}
				</div>

			{!! Form::close() !!}

@endsection
