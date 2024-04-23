@extends('website.layouts.main')
@section('title')
    Skill Show: {{ $skill->name }}
@endsection
@section('content')
    <!-- Hero-area -->
    <x-website.breadcrumb.layout>
        <x-website.breadcrumb.link url="{{ route('website.categories.show', $skill->category->id) }}" text="{{ $skill->category->name }}" />
        <x-website.breadcrumb.active text="{{ $skill->name }}" />
        <x-website.breadcrumb.text textName="{{ $skill->name }}" />
    </x-website.breadcrumb.layout>
    <!-- /Hero-area -->

    <!-- Blog -->
    <div id="blog" class="section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <!-- main blog -->
                <div id="main" class="col-md-12">

                    <!-- row -->
                    <div class="row">

                        @foreach ($exams as $exam)
                            <!-- single exam -->
                            <div class="col-md-3">
                                <div class="single-blog">
                                    <div class="blog-img">
                                        <a href="exam.html">
                                            <img src="{{ asset("uploads/$exam->image") }}" alt="">
                                        </a>
                                    </div>
                                    <h4><a href="{{ route('website.exams.show', $exam->id) }}"> {{ $exam->name }}</a></h4>
                                    <div class="blog-meta">
                                        <span> {{ Carbon\Carbon::parse($exam->created_at)->format('d M, Y') }} </span>
                                        <div class="pull-right">
                                            <span class="blog-meta-comments"><a href="#"><i class="fa fa-users"></i> {{ $exam->users_count }}</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /single exam -->
                        @endforeach
                    </div>
                    <!-- /row -->


                </div>
                <!-- /main blog -->

            </div>
            <!-- row -->

        </div>
        <!-- container -->

    </div>
    <!-- /Blog -->
@endsection
