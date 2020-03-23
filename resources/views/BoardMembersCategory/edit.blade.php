
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
            <div align="right">
                <a href="{{ route('board_members_categories.index') }}" class="btn btn-default">Back</a>
            </div>
            <br />
			

			{{ Form::open([ 'method'  => 'post','class'  => '', 'route' => [ 'board_members_categories.update', $data->id ] ]) }}
				
				 @csrf
                @method('PATCH')

				<div class="form-group">
				{{ Form::label('id', (Lang::get('board_members_categories.enter_msg').' '.Lang::get('board_members_categories.id')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->id ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				<div class="form-group">
				{{ Form::label('id', (Lang::get('board_members_categories.enter_msg').' '.Lang::get('board_members_categories.board_members_category_name')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->board_members_category_name ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				<div class="form-group">
				{{ Form::label('id', (Lang::get('board_members_categories.enter_msg').' '.Lang::get('board_members_categories.board_members_category_position')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->board_members_category_position ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				<div class="form-group">
				{{ Form::label('id', (Lang::get('board_members_categories.enter_msg').' '.Lang::get('board_members_categories.board_members_category_active')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->board_members_category_active ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				
				<br />
					
					
				
				<div class="form-group">
				<label class="control-label ">&nbsp;&nbsp;</label>
				{{ Form::submit(Lang::get('board_members_categories.update_btn_msg'), array('class' => 'btn btn-primary input-lg col-md-1')) }}
				</div>

			{!! Form::close() !!}
			
@endsection			
			