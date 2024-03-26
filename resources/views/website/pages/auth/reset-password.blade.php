@extends('website.layouts.main')
@section('title')
    forgot Password
@endsection

@section('content')
    <!-- Contact -->
    <div id="contact" class="section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <!-- login form -->
                <div class="col-md-6 col-md-offset-3">
                    <div class="contact-form">
                        <h4>{{ __('website.global.forgot_password') }}</h4>
                        <x-auth-session-status :status="session('status')" />
                        <form action="{{ route('website.website.auth.password.store') }}" method="POST">
                            @csrf
                            <input class="input" type="email" name="email" placeholder="{{ __('website.global.email') }}" :value="old('email')" autofocus>
                            <x-input-error :messages="$errors->get('email')" class="mt-2  alert-danger" />

                            <input class="input" type="password" name="password" placeholder="{{ __('website.global.password') }}">
                            <x-input-error :messages="$errors->get('password')" class="mt-2 alert-danger" />

                            <input class="input" type="password" name="password_confirmation" placeholder="{{ __('website.global.confirm_password') }}">
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 alert-danger" />
                            <input type="hidden" name="token" value="{{ request()->route('token') }}">
                            <button type="submit" class="main-button icon-button pull-right">{{ __('website.global.submit') }}</button>
                        </form>
                    </div>
                </div>
                <!-- /login form -->

            </div>
            <!-- /row -->

        </div>
        <!-- /container -->

    </div>
    <!-- /Contact -->
@endsection
