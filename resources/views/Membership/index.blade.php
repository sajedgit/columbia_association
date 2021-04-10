@extends('parent')

@section('main')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ __('memberships.page_title') }}</h1>
    <p class="mb-4">{{ __('memberships.welcome_msg') }}</p>

    <div align="right">
        <a href="{{ route('memberships.create') }}" class="btn btn-success btn-sm">{{ __('memberships.create') }}</a>
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
                <h6 class="m-0 font-weight-bold text-primary">{{ __('memberships.page_name') }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>{{ __('memberships.name') }}</th>
                            <th>{{ __('memberships.email') }}</th>
                            <th>Payment Type</th>
                            <th>Membership Status</th>
                            <th>Photo</th>
                            <th>{{ __('memberships.active') }}</th>

                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>{{ __('memberships.name') }}</th>
                            <th>{{ __('memberships.email') }}</th>
                            <th>Payment Type</th>
                            <th>Membership Status</th>
                            <th>Photo</th>
                            <th>{{ __('memberships.active') }}</th>

                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($data as $row)
                            <tr>

                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->payment_type }}</td>
                                <td>
                                    <?php
                                        if(is_null($row->membership_status))
                                            echo "UnPaid";
                                        else
                                            {
                                                $membership_start_date = strtotime( $row->membership_start_date );
                                                $start_date = date( 'F j, Y', $membership_start_date );

                                                $membership_end_date = strtotime( $row->membership_end_date );
                                                $end_date = date( 'F j, Y', $membership_end_date );

                                                echo "Paid <b> [ $start_date - $end_date ] </b>";
                                            }

                                    ?>
                                </td>
                                <td><img src="{{ asset('public/images/member/'.$row->photo) }}" class="img-thumbnail"
                                         width="50"/></td>
                                <td> @if($row->active) Active @else Inactive @endif</td>


                                <td class="text-center">
                                    {{ Form::open([ 'method'  => 'delete', 'route' => [ 'memberships.destroy', $row->id ] ]) }}

                                    <a href="{{ route('memberships.show', $row->id) }}" class="btn btn-primary">Show</a>
                                    <a href="{{ route('memberships.edit', $row->id) }}" class="btn btn-warning">Edit</a>
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

