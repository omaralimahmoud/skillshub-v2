<nav id="nav">
    <ul class="main-menu nav navbar-nav navbar-right">
        <li><a href="{{ route('website.index') }}">{{ __('website.global.home') }}</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ __('website.global.categories') }} <span class="caret"></span></a>
            <ul class="dropdown-menu">
                @foreach ($categories as $category)
                    <li><a href="{{ route('website.categories.show',$category->id) }}"> {{ $category->name }}</a></li>
                @endforeach
            </ul>
        </li>
        <li><a href="Contact.html">{{ __('website.global.contact') }}</a></li>
        <li><a href="login.html">{{ __('website.global.Sign_in') }} </a></li>
        <li><a href="register.html">{{ __('website.global.sign_up') }}</a></li>
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
