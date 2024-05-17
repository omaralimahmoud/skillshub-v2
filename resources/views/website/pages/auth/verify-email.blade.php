@extends('website.layouts.main')
@section('title')
    verify Email
@endsection

@section('content')
    <div class=" alert  alert-success">
        <h3>{{ __('website.global.a_verification_email_sent_successfully_please_check_your_inbox') }}</h3>
    </div>
    <div class="container">

        <!-- row -->
        <div class="row">

            <!-- login form -->
            <div class="col-md-6 col-md-offset-3">
                <div class="contact-form">
                    <form action="{{ route('website.website.auth.verification.send') }}" method="POST">
                        @csrf
                        <button class="main-button icon-button pull-right" type="submit">{{ __('website.global.resend_email') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
