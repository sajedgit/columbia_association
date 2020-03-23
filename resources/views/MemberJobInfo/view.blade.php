@extends('parent')

@section('main')

<div class="jumbotron text-center">
 <div align="right">
  <a href="{{ route('member_job_infos.index') }}" class="btn btn-default">Back</a>
 </div>
 <br />
 
 <h3>{{ __('member_job_infos.ref_member_job_info_membership_id') }} - {{ $data->ref_member_job_info_membership_id }} </h3>
 <h3>{{ __('member_job_infos.member_command_code') }} - {{ $data->member_command_code }} </h3>
 <h3>{{ __('member_job_infos.member_command_name') }} - {{ $data->member_command_name }} </h3>
 <h3>{{ __('member_job_infos.member_rank') }} - {{ $data->member_rank }} </h3>
 <h3>{{ __('member_job_infos.member_shield') }} - {{ $data->member_shield }} </h3>
 <h3>{{ __('member_job_infos.member_appointment_date') }} - {{ $data->member_appointment_date }} </h3>
 <h3>{{ __('member_job_infos.member_promoted_date') }} - {{ $data->member_promoted_date }} </h3>
 <h3>{{ __('member_job_infos.member_boro') }} - {{ $data->member_boro }} </h3>
 <h3>{{ __('member_job_infos.member_benificiary') }} - {{ $data->member_benificiary }} </h3>
 <h3>{{ __('member_job_infos.member_reference_no') }} - {{ $data->member_reference_no }} </h3>
 <h3>{{ __('member_job_infos.member_retired') }} - {{ $data->member_retired }} </h3>
 <h3>{{ __('member_job_infos.member_job_info_creating_datetime') }} - {{ $data->member_job_info_creating_datetime }} </h3>
 <h3>{{ __('member_job_infos.member_job_info_editing_datetime') }} - {{ $data->member_job_info_editing_datetime }} </h3>
 

</div>
@endsection