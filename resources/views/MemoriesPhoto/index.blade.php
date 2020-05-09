@extends('parent')

@section('main')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ __('memories_photos.page_title') }}</h1>
    <p class="mb-4">{{ __('memories_photos.welcome_msg') }}</p>

    <div align="right">
        <a href="{{ route('memories_photos.create') }}"
           class="btn btn-success btn-sm">{{ __('memories_photos.create') }}</a>
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
                <h6 class="m-0 font-weight-bold text-primary">{{ __('memories_photos.page_name') }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>{{ __('memories_photos.ref_memories_id') }}</th>
                            <th>{{ __('memories_photos.memories_photo_location') }}</th>

                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>{{ __('memories_photos.ref_memories_id') }}</th>
                            <th>{{ __('memories_photos.memories_photo_location') }}</th>

                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($data as $row)
                            <tr>

                                <td>{{ $row->memories_name }}</td>
                                <td> <img width="100" src="{{ asset($row->memories_photo_location) }}"> </td>


                       <td class=" text-center">
                                    {{ Form::open([ 'method'  => 'delete', 'route' => [ 'memories_photos.destroy', $row->id ] ]) }}

                                    <a href="{{ route('memories_photos.show', $row->id) }}"
                                       class="btn btn-primary">Show</a>
                                    <a href="{{ route('memories_photos.edit', $row->id) }}"
                                       class="btn btn-warning">Edit</a>
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

