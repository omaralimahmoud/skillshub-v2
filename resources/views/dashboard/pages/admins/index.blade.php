@extends('dashboard.layouts.main')

@section('title')
    Admins
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Admins</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">All Admins </li>

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <section class="content my-5">
            <div class=" container-fluid">
                <div class=" row">
                    <div class=" col-12">
                        @include('dashboard.pages.messages.message')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Admins</h3>
                                <div class="card-tools">

                                    <a href="{{ route('dashboard.admins.create') }}" class=" btn btn-sm  btn-primary">
                                        Add New
                                    </a>
                                </div>

                            </div>

                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Verified</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins as $admin)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $admin->name }}</td>
                                                <td>{{ $admin->email }}</td>
                                                <td> {{ $admin->getRoleNames()->first() }} </td>
                                                <td>
                                                    @if ($admin->email_verified_at !== null)
                                                        <span class=" badge bg-success">Yes</span>
                                                    @else
                                                        <span class=" badge  bg-danger">No</span>
                                                    @endif
                                                </td>
                                                <td>


                                                    @if($admin->hasRole('admin'))

                                                        <a href="{{ route('dashboard.admins.promote', $admin->id) }}" class=" btn btn-danger">
                                                            <i class=" fas fa-level-up-alt"></i>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('dashboard.admins.demote', $admin->id) }}" class=" btn btn-success">
                                                            <i class=" fas fa-level-down-alt"></i>
                                                        </a>
                                                    @endif




                                                </td>




                                            </tr>
                                        @endforeach




                                    </tbody>
                                </table>
                                <div class=" d-flex justify-content-center my-3">
                                    {{ $admins->links() }}
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>

                </div>

            </div>
        </section>

    </div>
    <!-- /.content-wrapper -->
@endsection

@push('scripts')
    <script></script>
@endpush
