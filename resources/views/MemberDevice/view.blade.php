@extends('parent')

@section('main')

<div class="jumbotron text-center">
 <div align="right">
  <a href="{{ route('member_devices.index') }}" class="btn btn-default">Back</a>
 </div>
 <br />
 
 <h3>{{ __('member_devices.ref_member_device_membership_id') }} - {{ $data->ref_member_device_membership_id }} </h3>
 <h3>{{ __('member_devices.member_device_os_type') }} - {{ $data->member_device_os_type }} </h3>
 <h3>{{ __('member_devices.member_device_token_id') }} - {{ $data->member_device_token_id }} </h3>
 <h3>{{ __('member_devices.member_device_unique_id') }} - {{ $data->member_device_unique_id }} </h3>
 <h3>{{ __('member_devices.member_device_storing_datetime') }} - {{ $data->member_device_storing_datetime }} </h3>
 

</div>
@endsection