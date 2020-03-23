@extends('parent')

@section('main')

<div class="jumbotron text-center">
 <div align="right">
  <a href="{{ route('board_members_categories.index') }}" class="btn btn-default">Back</a>
 </div>
 <br />
 
 <h3>{{ __('board_members_categories.board_members_category_name') }} - {{ $data->board_members_category_name }} </h3>
 <h3>{{ __('board_members_categories.board_members_category_position') }} - {{ $data->board_members_category_position }} </h3>
 <h3>{{ __('board_members_categories.board_members_category_active') }} - {{ $data->board_members_category_active }} </h3>
 

</div>
@endsection