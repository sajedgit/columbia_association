@extends('parent')

@section('main')

<div class="jumbotron text-center">
 <div align="right">
  <a href="{{ route('contact_us.index') }}" class="btn btn-default">Back</a>
 </div>
 <br />
 
 <h3>{{ __('contact_us.ref_membership_id') }} - {{ $data->ref_membership_id }} </h3>
 <h3>{{ __('contact_us.contact_us_subject') }} - {{ $data->contact_us_subject }} </h3>
 <h3>{{ __('contact_us.contact_us_details') }} - {{ $data->contact_us_details }} </h3>
 <h3>{{ __('contact_us.contact_us_seen') }} - {{ $data->contact_us_seen }} </h3>
 <h3>{{ __('contact_us.contact_us_created_date_time') }} - {{ $data->contact_us_created_date_time }} </h3>
 

</div>
@endsection