@extends('parent')

@section('main')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ __('votes_position.page_title') }}</h1>
    <p class="mb-4">{{ __('votes_position.welcome_msg') }}</p>

    <div align="right">
        <a href="{{ route('votes_position.index') }}" class="btn btn-default">Back</a>
    </div>
    <br/>


    {{ Form::open([ 'method'  => 'post','class'  => 'col-sm-6','files'=>'true', 'route' => [ 'votes_position.update', $data->id ] ]) }}

    @csrf
    @method('PATCH')



    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('vote_id', (Lang::get('votes_position.enter_msg').' '.Lang::get('votes_position.vote_id')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">

            {!! Form::select('vote_id', $items, $data->vote_id, ['class' => 'form-control']) !!}
        </div>
    </div>


    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('position_name', (Lang::get('votes_position.enter_msg').' '.Lang::get('votes_position.position_name')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('position_name', $value = $data->position_name ,array('class' => 'form-control')) }}
        </div>
    </div>


    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('noc', (Lang::get('votes_position.enter_msg').' '.Lang::get('votes_position.noc')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('noc', $value = $data->noc ,array('class' => 'form-control')) }}
        </div>
    </div>


    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('sort_order', (Lang::get('votes_position.enter_msg').' '.Lang::get('votes_position.sort_order')),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">
            {{ Form::text('sort_order', $value = $data->sort_order ,array('class' => 'form-control')) }}
        </div>
    </div>

    <?php
    use App\Http\Controllers\VotePositionsController;
    $member_arr= VotePositionsController::get_member($data->vote_id,$data->id);

    ?>



    <br/>

    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            {{ Form::label('member', (' Candidates '),array('class'=>'control-label')) }}
        </div>
        <div class="col-sm-8">

            {!! Form::select('member[]', $member,$member_arr, ['multiple'=>'multiple','class' => 'form-control']) !!}
        </div>
    </div>

    <br/>




    <div class="form-group">
        <label class="control-label ">&nbsp;&nbsp;</label>
        {{ Form::submit(Lang::get('votes_position.update_btn_msg'), array('class' => 'btn btn-primary')) }}
    </div>

    {!! Form::close() !!}

@endsection
