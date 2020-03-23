@extends('parent')

@section('main')

<div class="jumbotron text-center">
 <div align="right">
  <a href="{{ route('memories.index') }}" class="btn btn-default">Back</a>
 </div>
 <br />
 
 <h3>{{ __('memories.memories_name') }} - {{ $data->memories_name }} </h3>
 <h3>{{ __('memories.memories_details') }} - {{ $data->memories_details }} </h3>
 <h3>{{ __('memories.memories_created_date_time') }} - {{ $data->memories_created_date_time }} </h3>
 <h3>{{ __('memories.memories_editing_datetime') }} - {{ $data->memories_editing_datetime }} </h3>
 <h3>{{ __('memories.memories_active') }} - {{ $data->memories_active }} </h3>
 

</div>
@endsection