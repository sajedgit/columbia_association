@extends('parent')

@section('main')

<div class="jumbotron text-center">
 <div align="right">
  <a href="{{ route('board_members.index') }}" class="btn btn-default">Back</a>
 </div>
 <br />
 
 <h3>{{ __('board_members.ref_board_members_category_id') }} - {{ $data->ref_board_members_category_id }} </h3>
 <h3>{{ __('board_members.board_members_first_name') }} - {{ $data->board_members_first_name }} </h3>
 <h3>{{ __('board_members.board_members_last_name') }} - {{ $data->board_members_last_name }} </h3>
 <h3>{{ __('board_members.board_members_image_location') }} - {{ $data->board_members_image_location }} </h3>
 <h3>{{ __('board_members.board_member_designation') }} - {{ $data->board_member_designation }} </h3>
 <h3>{{ __('board_members.board_members_email_address') }} - {{ $data->board_members_email_address }} </h3>
 <h3>{{ __('board_members.board_members_position') }} - {{ $data->board_members_position }} </h3>
 <h3>{{ __('board_members.board_members_active') }} - {{ $data->board_members_active }} </h3>
 

</div>
@endsection