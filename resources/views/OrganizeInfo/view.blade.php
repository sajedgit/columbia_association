@extends('parent')

@section('main')

<div class="jumbotron text-center">
 <div align="right">
  <a href="{{ route('organize_infos.index') }}" class="btn btn-default">Back</a>
 </div>
 <br />
 
 <h3>{{ __('organize_infos.organize_telephone') }} - {{ $data->organize_telephone }} </h3>
 <h3>{{ __('organize_infos.organize_email') }} - {{ $data->organize_email }} </h3>
 <h3>{{ __('organize_infos.organize_facebook') }} - {{ $data->organize_facebook }} </h3>
 <h3>{{ __('organize_infos.organize_instagram') }} - {{ $data->organize_instagram }} </h3>
 <h3>{{ __('organize_infos.organize_linkedin') }} - {{ $data->organize_linkedin }} </h3>
 <h3>{{ __('organize_infos.organize_twitter') }} - {{ $data->organize_twitter }} </h3>
 <h3>{{ __('organize_infos.organize_info_created_edited_datetime') }} - {{ $data->organize_info_created_edited_datetime }} </h3>
 

</div>
@endsection