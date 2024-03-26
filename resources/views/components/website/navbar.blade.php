<nav id="nav">
    <form id="logout-form" action="{{ route('website.website.auth.logout') }}" method="POST" class="  d-none">
        @csrf

    </form>
    <ul class="main-menu nav navbar-nav navbar-right">
        <li><a href="{{ route('website.index') }}">{{ __('website.global.home') }}</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ __('website.global.categories') }} <span class="caret"></span></a>
            <ul class="dropdown-menu">
                @foreach ($categories as $category)
                    <li><a href="{{ route('website.categories.show', $category->id) }}"> {{ $category->name }}</a></li>
                @endforeach
            </ul>
        </li>
        <li><a href="{{ route('website.contact.index') }}">{{ __('website.global.contact') }}</a></li>
        @guest
            <li><a href="{{ route('website.website.auth.login') }}">{{ __('website.global.Sign_in') }} </a></li>
            <li><a href="{{ route('website.website.auth.register') }}">{{ __('website.global.sign_up') }}</a></li>

        @endguest

        @auth

            @if (auth()->user()->hasRole('student'))
                <li><a href="{{ route('website.profile.index') }}">{{ __('website.pages.profile.profile') }}</a></li>
            @endif

            <li> <a id="logout-link" href="#">{{ __('website.global.sign_out') }}</a></li>
        @endauth

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ LaravelLocalization::getCurrentLocaleNative() }}<span class="caret"></span></a>
            <ul class="dropdown-menu">
                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li>
                        <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
    </ul>
</nav>
@push('scripts')
    <script>
        $('#logout-link').click(function(e) {
            e.preventDefault()
            $('#logout-form').submit()
        })
    </script>
@endpush
