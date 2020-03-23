@extends('parent')

@section('main')

<div class="jumbotron text-center">
 <div align="right">
  <a href="{{ route('memories_photos.index') }}" class="btn btn-default">Back</a>
 </div>
 <br />
 
 <h3>{{ __('memories_photos.ref_memories_id') }} - {{ $data->ref_memories_id }} </h3>
 <h3>{{ __('memories_photos.memories_photo_location') }} - {{ $data->memories_photo_location }} </h3>
 <h3>{{ __('memories_photos.memories_photo_uploaded_date_time') }} - {{ $data->memories_photo_uploaded_date_time }} </h3>
 <h3>{{ __('memories_photos.memories_photo_active') }} - {{ $data->memories_photo_active }} </h3>
 

</div>
@endsection