@extends('website.layouts.main')
@section('title')
    register
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
                        <li>{{ __('website.global.sign_up') }}</li>
                    </ul>
                    <h1 class="white-text">{{ __('website.global.sign_up_and_estimate_your_skills') }}</h1>

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
                        <h4>{{ __('website.global.sign_up') }}</h4>
                        <form action="{{ route('website.website.auth.register') }}" method="POST">
                            @csrf
                            <x-input-error :messages="$errors->get('name')" class="mt-2 alert-danger" />

                            <input class="input" type="text" name="name" placeholder="{{ __('website.global.name') }}" :value="old('name')" autofocus>
                            <x-input-error :messages="$errors->get('email')" class="mt-2  alert-danger" />

                            <input class="input" type="email" name="email" placeholder="{{ __('website.global.email') }}" :value="old('email')" autofocus>
                            <x-input-error :messages="$errors->get('password')" class="mt-2 alert-danger" />

                            <input class="input" type="password" name="password" placeholder="{{ __('website.global.password') }}">

                            <input class="input" type="password" name="password_confirmation" placeholder="{{ __('website.global.confirm_password') }}">
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 alert-danger" />



                            <button type="submit" class="main-button icon-button pull-right">{{ __('website.global.sign_up') }}</button>


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
