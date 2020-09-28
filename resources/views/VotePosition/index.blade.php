@extends('parent')

@section('main')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ __('votes_position.page_title') }}</h1>
    <p class="mb-4">{{ __('votes_position.welcome_msg') }}</p>

    <div align="right">
        <a href="{{ route('votes_position.create') }}" class="btn btn-success btn-sm">{{ __('votes_position.create') }}</a>
    </div>
    <br/>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('votes_position.page_name') }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>{{ __('votes_position.vote_id') }}</th>
                            <th>{{ __('votes_position.position_name') }}</th>
                            <th>{{ __('votes_position.noc') }}</th>
                            <th>{{ __('votes_position.sort_order') }}</th>


                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>{{ __('votes_position.vote_id') }}</th>
                            <th>{{ __('votes_position.position_name') }}</th>
                            <th>{{ __('votes_position.noc') }}</th>
                            <th>{{ __('votes_position.sort_order') }}</th>


                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($data as $row)
                            <tr>

                                <td>{{ $row->vote_name }}</td>
                                <td>{{ $row->position_name }}</td>
                                <td>{{ $row->noc }}</td>
                                <td>{{ $row->sort_order }}</td>



                                <td class="text-center">
                                    {{ Form::open([ 'method'  => 'delete', 'route' => [ 'votes_position.destroy', $row->id ] ]) }}

                                    <a href="{{ route('votes_position.show', $row->id) }}" class="btn btn-primary">Show</a>
                                    <a href="{{ route('votes_position.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('Are you sure you want to delete this item?');"
                                            class="btn btn-danger">Delete
                                    </button>
                                    {{ Form::close() }}

                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->



@endsection

