@extends('dashboard.layouts.auth.auth-main')
@section('title')
@endsection
@section('content')
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>Skills</b>Hub</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">
                    You forgot your password? Here you can easily retrieve a new password.

                </p>
                <x-auth-session-status :status="session('status')" />

                <form action="{{ route('dashboard.dashboard.auth.password.email') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <x-input-error :messages="$errors->get('email')" class="mt-2  alert-danger" />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-2">Sign In</button>
                    </div>
                    <!-- /.col -->
                </form>




            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
