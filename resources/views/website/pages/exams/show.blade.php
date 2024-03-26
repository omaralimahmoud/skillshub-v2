@extends('website.layouts.main')

@section('title')
    Show Exam: {{ $exam->name }}
@endsection

@section('content')
    <!-- Hero-area -->
    <x-website.breadcrumb.layout>
        <x-website.breadcrumb.link url="{{ route('website.categories.show', $exam->skill->category->id) }}" text="{{ $exam->skill->category->name }}" />
        <x-website.breadcrumb.link url="{{ route('website.skills.show', $exam->skill->id) }}" text="{{ $exam->skill->name }}" />
        <x-website.breadcrumb.active text="{{ $exam->name }}" />
        <x-website.breadcrumb.text textName="{{ $exam->name }}" />
        <x-website.breadcrumb.active text="{{ Carbon\Carbon::parse($exam->created_at)->format('d M, Y') }}" />
        <li class="blog-meta-comments "><a><i class="fa fa-users"></i> {{ $exam->users->count() }}</a></li>
    </x-website.breadcrumb.layout>
    <!-- /Hero-area -->

    <!-- Blog -->
    <div id="blog" class="section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <!-- main blog -->
                <div id="main" class="col-md-9">
                    @include('website.pages.errors.error')
                    <!-- blog post -->
                    <div class="blog-post mb-5">
                        <p>{{ $exam->description }} </p>
                    </div>
                    <!-- /blog post -->

                    <div>
                        @if ($canStartButton)
                            <form action="{{ route('website.exams.questions.store', $exam->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="main-button icon-button pull-left">{{ __('website.pages.exams.start_exam_button') }}</button>


                                <form>
                        @endif
                    </div>
                </div>
                <!-- /main blog -->


                <!-- aside blog -->

                @include('website.layouts.partials.main.sidebar')
                <!-- /aside blog -->


            </div>
            <!-- row -->

        </div>
        <!-- container -->

    </div>
    <!-- /Blog -->
@endsection
