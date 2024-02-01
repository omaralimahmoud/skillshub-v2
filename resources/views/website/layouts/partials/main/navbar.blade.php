 <!-- Header -->
 <header id="header">
     <div class="container">
         <div class="navbar-header">
             <!-- Logo -->
             <div class="navbar-brand">
                 <a class="logo" href="index.html">
                     <img src="{{ asset('assets/website/images/logo.png') }}" alt="logo">
                 </a>
             </div>
             <!-- /Logo -->
             <!-- Mobile toggle -->
             <button class="navbar-toggle">
                 <span></span>
             </button>
             <!-- /Mobile toggle -->
         </div>
         <!-- Navigation -->
         <nav id="nav">
             <ul class="main-menu nav navbar-nav navbar-right">
                 <li><a href="{{ route('website.home') }}">{{ __('website.global.home') }}</a></li>
                 <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ __('website.global.categories') }} <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                         <li><a href="#">Programming</a></li>
                         <li><a href="#">Design</a></li>
                         <li><a href="#">Management</a></li>
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
         <!-- /Navigation -->
     </div>
 </header>
 <!-- /Header -->
