@extends('website.layouts.main')
@section('title')
    login
@endsection

@section('content')
    <!-- Hero-area -->
    <div class="hero-area section">

        <!-- Backgound Image -->
        <div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('assets/website/images/home-background.jpg') }})"></div>
        <!-- /Backgound Image -->

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <ul class="hero-area-tree">
                        <li><a href="{{ route('website.index') }}">{{ __('website.global.home') }}</a></li>
                        <li>{{ __('website.global.Sign_in') }}</li>
                    </ul>
                    <h1 class="white-text">{{ __('website.global.sign_in_to_start_exam') }}</h1>

                </div>
            </div>
        </div>

    </div>
    <!-- /Hero-area -->


    <!-- Contact -->
    <div id="contact" class="section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <!-- login form -->
                <div class="col-md-6 col-md-offset-3">
                    <div class="contact-form">
                        <h4> {{ __('website.global.Sign_in') }}</h4>
                        <x-auth-session-status :status="session('status')" />
                        <form action="{{ route('website.website.auth.login') }}" method="POST">
                            @csrf
                            <input class="input" type="email" name="email" placeholder="{{ __('website.global.email') }}">
                            <x-input-error :messages="$errors->get('email')" class="mt-2  alert-danger" />

                            <input class="input" type="password" name="password" placeholder="{{ __('website.global.password') }}">
                            <x-input-error :messages="$errors->get('password')" class="mt-2  alert-danger" />

                            <input type="checkbox" name="remember" class=" custom-control-input">
                            <label class=" custom-control-label"> {{ __('website.global.remember_me') }}</label>
                            <button type="submit" class="main-button icon-button pull-right">{{ __('website.global.Sign_in') }}</button>
                            <a href="{{ route('website.website.auth.password.request') }}"> {{ __('website.global.forgot_password') }}</a>
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
