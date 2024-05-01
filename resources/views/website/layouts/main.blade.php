<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SkillsHub-@yield('title')</title>
    @include('website.layouts.partials.main.styles')
    @stack('style')
</head>

<body>

    @include('website.layouts.partials.main.navbar')
    @yield('content')
    <!-- preloader -->
    <div id='preloader'>
        <div class='preloader'></div>
    </div>
    <!-- /preloader -->
    @include('website.layouts.partials.main.footer')
    @include('website.layouts.partials.main.scripts')
    @include('website.layouts.partials.main.pusher')
    @stack('scripts')
</body>

</html>
