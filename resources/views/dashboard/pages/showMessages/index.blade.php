@extends('dashboard.layouts.main')

@section('title')
    Messages
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Messages</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">All Messages </li>

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
                                <h3 class="card-title">All Messages</h3>
                                <div class="card-tools">


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
                                            <th>Subject</th>

                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($messages as $message)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $message->name }}</td>
                                                <td>{{ $message->email }}</td>
                                                <td> {{ $message->subject ?? "..." }} </td>

                                                <td>




                                                        <a href="{{ route('dashboard.messages.show', $message->id) }}" class=" btn btn-primary">
                                                            <i class=" fas fa-eye"></i>
                                                        </a>






                                                </td>




                                            </tr>
                                        @endforeach




                                    </tbody>
                                </table>
                                <div class=" d-flex justify-content-center my-3">
                                    {{ $messages->links() }}
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
