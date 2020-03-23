
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
                <a href="{{ route('member_personal_infos.index') }}" class="btn btn-default">Back</a>
            </div>
            <br />
			

			{{ Form::open([ 'method'  => 'post','class'  => '', 'route' => [ 'member_personal_infos.update', $data->id ] ]) }}
				
				 @csrf
                @method('PATCH')

				<div class="form-group">
				{{ Form::label('id', (Lang::get('member_personal_infos.enter_msg').' '.Lang::get('member_personal_infos.id')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->id ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				<div class="form-group">
				{{ Form::label('id', (Lang::get('member_personal_infos.enter_msg').' '.Lang::get('member_personal_infos.ref_member_personal_info_membership_id')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->ref_member_personal_info_membership_id ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				<div class="form-group">
				{{ Form::label('id', (Lang::get('member_personal_infos.enter_msg').' '.Lang::get('member_personal_infos.member_first_name')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->member_first_name ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				<div class="form-group">
				{{ Form::label('id', (Lang::get('member_personal_infos.enter_msg').' '.Lang::get('member_personal_infos.member_last_name')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->member_last_name ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				<div class="form-group">
				{{ Form::label('id', (Lang::get('member_personal_infos.enter_msg').' '.Lang::get('member_personal_infos.member_birth_date')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->member_birth_date ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				<div class="form-group">
				{{ Form::label('id', (Lang::get('member_personal_infos.enter_msg').' '.Lang::get('member_personal_infos.member_gender')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->member_gender ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				<div class="form-group">
				{{ Form::label('id', (Lang::get('member_personal_infos.enter_msg').' '.Lang::get('member_personal_infos.member_address')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->member_address ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				<div class="form-group">
				{{ Form::label('id', (Lang::get('member_personal_infos.enter_msg').' '.Lang::get('member_personal_infos.member_zip_code')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->member_zip_code ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				<div class="form-group">
				{{ Form::label('id', (Lang::get('member_personal_infos.enter_msg').' '.Lang::get('member_personal_infos.member_email_address')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->member_email_address ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				<div class="form-group">
				{{ Form::label('id', (Lang::get('member_personal_infos.enter_msg').' '.Lang::get('member_personal_infos.member_tax_reg_no')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->member_tax_reg_no ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				<div class="form-group">
				{{ Form::label('id', (Lang::get('member_personal_infos.enter_msg').' '.Lang::get('member_personal_infos.member_personal_info_creating_datetime')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->member_personal_info_creating_datetime ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				<div class="form-group">
				{{ Form::label('id', (Lang::get('member_personal_infos.enter_msg').' '.Lang::get('member_personal_infos.member_personal_info_editing_datetime')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->member_personal_info_editing_datetime ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				
				<br />
					
					
				
				<div class="form-group">
				<label class="control-label ">&nbsp;&nbsp;</label>
				{{ Form::submit(Lang::get('member_personal_infos.update_btn_msg'), array('class' => 'btn btn-primary input-lg col-md-1')) }}
				</div>

			{!! Form::close() !!}
			
@endsection			
			