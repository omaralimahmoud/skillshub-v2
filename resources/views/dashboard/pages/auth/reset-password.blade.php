@extends('dashboard.layouts.auth.auth-main')
@section('title')
forgot Password
@endsection

@section('content')
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>Skills</b>Hub</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <x-auth-session-status :status="session('status')" />

                <form action="{{ route('dashboard.dashboard.auth.password.store') }}" method="POST">
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
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2  alert-danger" />

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="password_confirmation">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2  alert-danger" />

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="token" value="{{ request()->route('token') }}">
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>




            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
