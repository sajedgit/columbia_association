@extends('parent')

@section('main')

<div class="jumbotron text-center">
 <div align="right">
  <a href="{{ route('sponsors.index') }}" class="btn btn-default">Back</a>
 </div>
 <br />
 
 <h3>{{ __('sponsors.sponsor_name') }} - {{ $data->sponsor_name }} </h3>
 <h3>{{ __('sponsors.sponsor_details') }} - {{ $data->sponsor_details }} </h3>
 <h3>{{ __('sponsors.sponsor_address') }} - {{ $data->sponsor_address }} </h3>
 <h3>{{ __('sponsors.sponsor_email') }} - {{ $data->sponsor_email }} </h3>
 <h3>{{ __('sponsors.sponsor_website') }} - {{ $data->sponsor_website }} </h3>
 <h3>{{ __('sponsors.sponsor_logo_photo') }} - {{ $data->sponsor_logo_photo }} </h3>
 <h3>{{ __('sponsors.sponsor_position') }} - {{ $data->sponsor_position }} </h3>
 <h3>{{ __('sponsors.sponsor_created_datetime') }} - {{ $data->sponsor_created_datetime }} </h3>
 <h3>{{ __('sponsors.sponsor_edited_date_time') }} - {{ $data->sponsor_edited_date_time }} </h3>
 

</div>
@endsection