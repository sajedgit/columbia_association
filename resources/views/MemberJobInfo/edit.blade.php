
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
                <a href="{{ route('member_job_infos.index') }}" class="btn btn-default">Back</a>
            </div>
            <br />
			

			{{ Form::open([ 'method'  => 'post','class'  => '', 'route' => [ 'member_job_infos.update', $data->id ] ]) }}
				
				 @csrf
                @method('PATCH')

				<div class="form-group">
				{{ Form::label('id', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.id')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->id ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				<div class="form-group">
				{{ Form::label('id', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.ref_member_job_info_membership_id')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->ref_member_job_info_membership_id ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				<div class="form-group">
				{{ Form::label('id', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_command_code')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->member_command_code ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				<div class="form-group">
				{{ Form::label('id', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_command_name')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->member_command_name ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				<div class="form-group">
				{{ Form::label('id', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_rank')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->member_rank ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				<div class="form-group">
				{{ Form::label('id', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_shield')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->member_shield ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				<div class="form-group">
				{{ Form::label('id', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_appointment_date')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->member_appointment_date ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				<div class="form-group">
				{{ Form::label('id', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_promoted_date')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->member_promoted_date ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				<div class="form-group">
				{{ Form::label('id', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_boro')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->member_boro ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				<div class="form-group">
				{{ Form::label('id', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_benificiary')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->member_benificiary ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				<div class="form-group">
				{{ Form::label('id', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_reference_no')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->member_reference_no ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				<div class="form-group">
				{{ Form::label('id', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_retired')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->member_retired ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				<div class="form-group">
				{{ Form::label('id', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_job_info_creating_datetime')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->member_job_info_creating_datetime ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				<div class="form-group">
				{{ Form::label('id', (Lang::get('member_job_infos.enter_msg').' '.Lang::get('member_job_infos.member_job_info_editing_datetime')),array('class'=>'control-label col-md-4')) }}	
					<div class="col-md-8">
						{{ Form::text('id', $value = $data->member_job_info_editing_datetime ,array('class' => 'form-control input-lg')) }}
					</div>
				</div>

				
				<br />
					
					
				
				<div class="form-group">
				<label class="control-label ">&nbsp;&nbsp;</label>
				{{ Form::submit(Lang::get('member_job_infos.update_btn_msg'), array('class' => 'btn btn-primary input-lg col-md-1')) }}
				</div>

			{!! Form::close() !!}
			
@endsection			
			