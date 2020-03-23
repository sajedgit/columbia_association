@extends('parent')

@section('main')

<div class="jumbotron text-center">
 <div align="right">
  <a href="{{ route('messages.index') }}" class="btn btn-default">Back</a>
 </div>
 <br />
 
 <h3>{{ __('messages.message_details') }} - {{ $data->message_details }} </h3>
 <h3>{{ __('messages.message_active') }} - {{ $data->message_active }} </h3>
 <h3>{{ __('messages.message_created_datetime') }} - {{ $data->message_created_datetime }} </h3>
 <h3>{{ __('messages.message_edited_datetime') }} - {{ $data->message_edited_datetime }} </h3>
 

</div>
@endsection