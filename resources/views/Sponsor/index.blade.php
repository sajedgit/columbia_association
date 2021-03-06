@extends('parent')

@section('main')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ __('sponsors.page_title') }}</h1>
    <p class="mb-4">{{ __('sponsors.welcome_msg') }}</p>

    <div align="right">
        <a href="{{ route('sponsors.create') }}" class="btn btn-success btn-sm">{{ __('sponsors.create') }}</a>
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
                <h6 class="m-0 font-weight-bold text-primary">{{ __('sponsors.page_name') }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>{{ __('sponsors.sponsor_name') }}</th>
                            <th>{{ __('sponsors.sponsor_details') }}</th>
                            <th>{{ __('sponsors.sponsor_address') }}</th>
                            <th>{{ __('sponsors.sponsor_email') }}</th>
                            <th>{{ __('sponsors.sponsor_website') }}</th>
                            <th>{{ __('sponsors.sponsor_logo_photo') }}</th>

                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>{{ __('sponsors.sponsor_name') }}</th>
                            <th>{{ __('sponsors.sponsor_details') }}</th>
                            <th>{{ __('sponsors.sponsor_address') }}</th>
                            <th>{{ __('sponsors.sponsor_email') }}</th>
                            <th>{{ __('sponsors.sponsor_website') }}</th>
                            <th>{{ __('sponsors.sponsor_logo_photo') }}</th>

                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($data as $row)
                            <tr>

                                <td>{{ $row->sponsor_name }}</td>
                                <td>{{ $row->sponsor_details }}</td>
                                <td>{{ $row->sponsor_address }}</td>
                                <td>{{ $row->sponsor_email }}</td>
                                <td>{{ $row->sponsor_website }}</td>
                                <td><img width="50" src="{{ asset('public/images/sponsor/'.$row->sponsor_logo_photo) }}"></td>


                                <td class="text-center">
                                    {{ Form::open([ 'method'  => 'delete', 'route' => [ 'sponsors.destroy', $row->id ] ]) }}

                                    <a href="{{ route('sponsors.show', $row->id) }}" class="btn btn-primary">Show</a>
                                    <a href="{{ route('sponsors.edit', $row->id) }}" class="btn btn-warning">Edit</a>
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


    {!! $data->links() !!}
@endsection

