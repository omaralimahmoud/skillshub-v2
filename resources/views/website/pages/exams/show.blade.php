@extends('website.layouts.main')

@section('title')
    Show Exam:
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
                        <li><a href="index.html">Home</a></li>
                        <li><a href="category.html">Category name</a></li>
                        <li><a href="category.html">Skill name</a></li>
                        <li>Exam name</li>
                    </ul>
                    <h1 class="white-text">Exam name</h1>
                    <ul class="blog-post-meta">
                        <li>18 Oct, 2017</li>
                        <li class="blog-meta-comments"><a href="#"><i class="fa fa-users"></i> 35</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
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
                            An aeterno percipit per. His minim maiestatis consetetur et, brute tantas iracundia id sea.
                            Vim tota nostrum reformidans te. Nam ad appareat mediocritatem, mediocrem similique usu ex,
                            scaevola invidunt eu sed.
                            An aeterno percipit per. His minim maiestatis consetetur et, brute tantas iracundia id sea.
                            Vim tota nostrum reformidans te. Nam ad appareat mediocritatem, mediocrem similique usu ex,
                            scaevola invidunt eu sed.
                            An aeterno percipit per. His minim maiestatis consetetur et, brute tantas iracundia id sea.
                            Vim tota nostrum reformidans te. Nam ad appareat mediocritatem, mediocrem similique usu ex,
                            scaevola invidunt eu sed.
                            An aeterno percipit per. His minim maiestatis consetetur et, brute tantas iracundia id sea.
                            Vim tota nostrum reformidans te. Nam ad appareat mediocritatem, mediocrem similique usu ex,
                            scaevola invidunt eu sed.
                            An aeterno percipit per. His minim maiestatis consetetur et, brute tantas iracundia id sea.
                            Vim tota nostrum reformidans te. Nam ad appareat mediocritatem, mediocrem similique usu ex,
                            scaevola invidunt eu sed.
                        </p>
                    </div>
                    <!-- /blog post -->

                    <div>
                        <button class="main-button icon-button pull-left">{{ __('website.pages.exams.start_exam_button') }}</button>
                    </div>
                </div>
                <!-- /main blog -->

                <!-- aside blog -->
                <div id="aside" class="col-md-3">

                    <!-- exam details widget -->
                    <ul class="list-group">
                        <li class="list-group-item">{{ __('website.pages.exams.skill') }}: programming</li>
                        <li class="list-group-item">{{ __('website.pages.exams.questions') }} 20</li>
                        <li class="list-group-item">{{ __('website.pages.exams.duration') }}: 30 mins</li>
                        <li class="list-group-item">{{ __('website.pages.exams.difficulty') }}:
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </li>
                    </ul>
                    <!-- /exam details widget -->



                </div>
                <!-- /aside blog -->

            </div>
            <!-- row -->

        </div>
        <!-- container -->

    </div>
    <!-- /Blog -->
@endsection
