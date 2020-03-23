@extends('parent')

@section('main')

<div class="jumbotron text-center">
 <div align="right">
  <a href="{{ route('memberships.index') }}" class="btn btn-default">Back</a>
 </div>
 <br />
 
 <h3>{{ __('memberships.membership_username') }} - {{ $data->membership_username }} </h3>
 <h3>{{ __('memberships.membership_password_value') }} - {{ $data->membership_password_value }} </h3>
 <h3>{{ __('memberships.membership_status') }} - {{ $data->membership_status }} </h3>
 <h3>{{ __('memberships.membership_expired_date') }} - {{ $data->membership_expired_date }} </h3>
 <h3>{{ __('memberships.membership_creating_datetime') }} - {{ $data->membership_creating_datetime }} </h3>
 <h3>{{ __('memberships.membership_editing_datetime') }} - {{ $data->membership_editing_datetime }} </h3>
 

</div>
@endsection