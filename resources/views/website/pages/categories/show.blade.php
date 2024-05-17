@extends('website.layouts.main')

@section('title')
    categories-{{ $category->name }}
@endsection

@section('content')
    <!-- Hero-area -->
    <x-website.breadcrumb.layout>
        <x-website.breadcrumb.active text="{{ $category->name }}" />
        <x-website.breadcrumb.text textName="{{ $category->name }}" />
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

                    <!-- row -->
                    <div class="row">


                        @foreach ($skills as $skill)
                            <!-- single skill -->
                            <div class="col-md-4">
                                <div class="single-blog">
                                    <div class="blog-img">
                                        <a href="skill.html">
                                            <img   src="{{ asset("uploads/$skill->image") }}" alt="">
                                        </a>
                                    </div>
                                    <h4><a href="{{ route('website.skills.show', $skill->id) }}"> {{ $skill->name }}</a></h4>
                                    <div class="blog-meta">
                                        <span>{{ \Carbon\Carbon::parse($skill->created_at)->format('d M, Y') }}</span>
                                        <div class="pull-right">
                                            <span class="blog-meta-comments">
                                                <a href="#">
                                                    <i class="fa fa-users"></i>
                                                    {{ $skill->getStudentsCount() }}
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /single skill -->
                        @endforeach



                    </div>
                    <!-- /row -->

                    <!-- row -->
                    <div class="row">

                        {{ $skills->links('website.layouts.partials.pagination.paginator') }}

                    </div>
                    <!-- /row -->
                </div>
                <!-- /main blog -->

                <!-- aside blog -->
                <div id="aside" class="col-md-3">

                    <!-- search widget -->
                    <div class="widget search-widget">
                        <form>
                            <input class="input" type="text" name="search">
                            <button><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <!-- /search widget -->

                    <!-- category widget -->
                    <div class="widget category-widget">
                        <h3>{{ __('website.global.categories') }}</h3>
                        @foreach ($categories as $oneCategory)
                            <a class="category" href="{{ route('website.categories.show', $oneCategory->id) }}"> {{ $oneCategory->name }}<span>{{ $oneCategory->skills_count }}</span></a>
                        @endforeach
                    </div>
                    <!-- /category widget -->
                </div>
                <!-- /aside blog -->

            </div>
            <!-- row -->

        </div>
        <!-- container -->

    </div>
    <!-- /Blog -->
@endsection
