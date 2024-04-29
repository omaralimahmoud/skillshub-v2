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
                    <div class=" col-12 pb-3">
                        @include('dashboard.pages.errors.errors')
                        <form action="{{ route('dashboard.admins.store') }}" method="POST">
                            @csrf
                            <div class=" card-body">
                                <div class=" row">
                                    <div class=" col-6">
                                        <div class=" form-group">
                                            <label>Name</label>
                                            <input type="text" class=" form-control" name="name">

                                        </div>

                                    </div>



                                    <div class=" col-6">
                                        <div class=" form-group">
                                            <label>Email</label>
                                            <input type="email" class=" form-control" name="email">

                                        </div>

                                    </div>
                                </div>


                                <div class=" row">
                                    <div class=" col-6">
                                        <div class=" form-group">
                                            <label>Password</label>
                                            <input type="password" class=" form-control" name="password">

                                        </div>

                                    </div>



                                    <div class=" col-6">
                                        <div class=" form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" class="form-control" name="password_confirmation">

                                        </div>

                                    </div>
                                    <div class=" col-6">
                                        <div class="form-group">
                                            <label>Role</label>
                                            <select class="custom-select form-control" name="role">
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div>
                                    <button type="submit" class=" btn btn-success">Submit</button>
                                    <a href="{{ url()->previous() }}" class=" btn btn-primary">Back</a>
                                </div>

                            </div>




                        </form>

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
