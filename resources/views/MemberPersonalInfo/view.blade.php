@extends('parent')

@section('main')

<div class="jumbotron text-center">
 <div align="right">
  <a href="{{ route('member_personal_infos.index') }}" class="btn btn-default">Back</a>
 </div>
 <br />
 
 <h3>{{ __('member_personal_infos.ref_member_personal_info_membership_id') }} - {{ $data->ref_member_personal_info_membership_id }} </h3>
 <h3>{{ __('member_personal_infos.member_first_name') }} - {{ $data->member_first_name }} </h3>
 <h3>{{ __('member_personal_infos.member_last_name') }} - {{ $data->member_last_name }} </h3>
 <h3>{{ __('member_personal_infos.member_birth_date') }} - {{ $data->member_birth_date }} </h3>
 <h3>{{ __('member_personal_infos.member_gender') }} - {{ $data->member_gender }} </h3>
 <h3>{{ __('member_personal_infos.member_address') }} - {{ $data->member_address }} </h3>
 <h3>{{ __('member_personal_infos.member_zip_code') }} - {{ $data->member_zip_code }} </h3>
 <h3>{{ __('member_personal_infos.member_email_address') }} - {{ $data->member_email_address }} </h3>
 <h3>{{ __('member_personal_infos.member_tax_reg_no') }} - {{ $data->member_tax_reg_no }} </h3>
 <h3>{{ __('member_personal_infos.member_personal_info_creating_datetime') }} - {{ $data->member_personal_info_creating_datetime }} </h3>
 <h3>{{ __('member_personal_infos.member_personal_info_editing_datetime') }} - {{ $data->member_personal_info_editing_datetime }} </h3>
 

</div>
@endsection