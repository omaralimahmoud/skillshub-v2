@extends('website.layouts.main')

@section('title')
    Exam Questions : {{ $exam->name }}
@endsection

@section('content')
    <!-- Hero-area -->
    <x-website.breadcrumb.layout>
        <x-website.breadcrumb.link url="{{ route('website.categories.show', $exam->skill->category->id) }}" text="{{ $exam->skill->category->name }}" />
        <x-website.breadcrumb.link url="{{ route('website.skills.show', $exam->skill->id) }}" text="{{ $exam->skill->name }}" />
        <x-website.breadcrumb.active text="{{ $exam->name }}" />
        <x-website.breadcrumb.text textName="{{ $exam->name }}" />
        <x-website.breadcrumb.active text="{{ Carbon\Carbon::parse($exam->created_at)->format('d M, Y') }}" />
        <li class="blog-meta-comments"><a><i class="fa fa-users"></i> {{ $exam->users->count() }}</a></li>
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

                    <!-- blog post -->
                    <div class="blog-post mb-5">
                        <p>
                            @foreach ($questions as $index => $question)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">{{ $index + 1 }}- {{ $question->title }}?</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
                                                {{ $question->option_1 }}
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                {{ $question->option_2 }}
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                {{ $question->option_3 }}
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                {{ $question->option_4 }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </p>
                    </div>
                    <!-- /blog post -->

                    <div>
                        <button class="main-button icon-button pull-left">{{ __('website.pages.exams.submit_button') }}</button>
                        <button class="main-button icon-button btn-danger pull-left ml-sm">{{ __('website.pages.exams.cancel_button') }}</button>
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
