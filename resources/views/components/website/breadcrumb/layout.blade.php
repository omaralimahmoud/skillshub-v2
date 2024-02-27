<div class="hero-area section">

    <!-- Backgound Image -->
    <div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('assets/website/images/page-background.jpg') }})"></div>
    <!-- /Backgound Image -->

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <ul class="hero-area-tree">
                    <li><a href="{{ route('website.index') }}">{{ __('website.global.home') }}</a></li>
                     {{ $slot }}
                </ul>
                

            </div>
        </div>
    </div>

</div>
