@extends('website.layouts.main')
@section('title')
    Profile
@endsection

@section('content')
    <!-- Hero-area -->
    <div class="hero-area section">

        <!-- Backgound Image -->
        <div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('assets/website/images/page-background.jpg') }})"></div>
        <!-- /Backgound Image -->

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <ul class="hero-area-tree">
                        <li><a href="{{ route('website.index') }}">{{ __('website.global.home') }}</a></li>
                        <li>{{ __('website.pages.profile.profile') }}</li>
                    </ul>
                    <h1 class="white-text">{{ __('website.pages.profile.profile') }}</h1>

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
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>

                                <th>{{ __('website.pages.profile.exam_name') }}</th>
                                <th>{{ __('website.pages.profile.score') }}</th>
                                <th>{{ __('website.pages.profile.time_minutes') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($exams as $exam)
                                <tr>

                                    <td>{{ $exam->name }}</td>
                                    <td>{{ $exam->pivot->score }}</td>
                                    <td>{{ $exam->pivot->time_minutes }}</td>
                                </tr>
                            @endforeach




                        </tbody>
                    </table>
                </div>
                <!-- /login form -->

            </div>
            <!-- /row -->

        </div>
        <!-- /container -->

    </div>
    <!-- /Contact -->
@endsection
