@extends('website.layouts.main')

@section('title')
    Show Category :
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
                        <li>Category name</li>
                    </ul>
                    <h1 class="white-text">Category name</h1>

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

                    <!-- row -->
                    <div class="row">

                        <!-- single skill -->
                        <div class="col-md-4">
                            <div class="single-blog">
                                <div class="blog-img">
                                    <a href="skill.html">
                                        <img src="./img/skill1.jpg" alt="">
                                    </a>
                                </div>
                                <h4><a href="skill.html">Pro eu error molestie deserunt. At per viderer bonorum persecuti.</a></h4>
                                <div class="blog-meta">
                                    <span>18 Oct, 2017</span>
                                    <div class="pull-right">
                                        <span class="blog-meta-comments"><a href="#"><i class="fa fa-users"></i> 35</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /single skill -->

                        <!-- single skill -->
                        <div class="col-md-4">
                            <div class="single-blog">
                                <div class="blog-img">
                                    <a href="skill.html">
                                        <img src="./img/skill2.jpg" alt="">
                                    </a>
                                </div>
                                <h4><a href="skill.html">Pro eu error molestie deserunt. At per viderer bonorum persecuti.</a></h4>
                                <div class="blog-meta">
                                    <span>18 Oct, 2017</span>
                                    <div class="pull-right">
                                        <span class="blog-meta-comments"><a href="#"><i class="fa fa-users"></i> 35</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /single skill -->

                        <!-- single skill -->
                        <div class="col-md-4">
                            <div class="single-blog">
                                <div class="blog-img">
                                    <a href="skill.html">
                                        <img src="./img/skill3.jpg" alt="">
                                    </a>
                                </div>
                                <h4><a href="skill.html">Pro eu error molestie deserunt. At per viderer bonorum persecuti.</a></h4>
                                <div class="blog-meta">
                                    <span>18 Oct, 2017</span>
                                    <div class="pull-right">
                                        <span class="blog-meta-comments"><a href="#"><i class="fa fa-users"></i> 35</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /single skill -->

                        <!-- single skill -->
                        <div class="col-md-4">
                            <div class="single-blog">
                                <div class="blog-img">
                                    <a href="skill.html">
                                        <img src="./img/skill4.jpg" alt="">
                                    </a>
                                </div>
                                <h4><a href="skill.html">Pro eu error molestie deserunt. At per viderer bonorum persecuti.</a></h4>
                                <div class="blog-meta">
                                    <span>18 Oct, 2017</span>
                                    <div class="pull-right">
                                        <span class="blog-meta-comments"><a href="#"><i class="fa fa-users"></i> 35</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /single skill -->

                        <!-- single skill -->
                        <div class="col-md-4">
                            <div class="single-blog">
                                <div class="blog-img">
                                    <a href="skill.html">
                                        <img src="./img/skill5.jpg" alt="">
                                    </a>
                                </div>
                                <h4><a href="skill.html">Pro eu error molestie deserunt. At per viderer bonorum persecuti.</a></h4>
                                <div class="blog-meta">
                                    <span>18 Oct, 2017</span>
                                    <div class="pull-right">
                                        <span class="blog-meta-comments"><a href="#"><i class="fa fa-users"></i> 35</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /single skill -->

                        <!-- single skill -->
                        <div class="col-md-4">
                            <div class="single-blog">
                                <div class="blog-img">
                                    <a href="skill.html">
                                        <img src="./img/skill6.jpg" alt="">
                                    </a>
                                </div>
                                <h4><a href="skill.html">Pro eu error molestie deserunt. At per viderer bonorum persecuti.</a></h4>
                                <div class="blog-meta">
                                    <span>18 Oct, 2017</span>
                                    <div class="pull-right">
                                        <span class="blog-meta-comments"><a href="#"><i class="fa fa-users"></i> 35</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /single skill -->

                    </div>
                    <!-- /row -->

                    <!-- row -->
                    <div class="row">

                        <!-- pagination -->
                        <div class="col-md-12">
                            <div class="post-pagination">
                                <a href="#" class="pagination-back pull-left">Back</a>
                                <ul class="pages">
                                    <li class="active">1</li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                </ul>
                                <a href="#" class="pagination-next pull-right">Next</a>
                            </div>
                        </div>
                        <!-- pagination -->

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
                        <h3>Categories</h3>
                        <a class="category" href="#">Programming <span>12</span></a>
                        <a class="category" href="#">Design <span>5</span></a>
                        <a class="category" href="#">Management <span>24</span></a>
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
