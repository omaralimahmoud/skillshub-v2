<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SkillsHub|Dashboard @yield('title')</title>
    @include('dashboard.layouts.partials.main.styles')
    @stack('styles')
</head>

<body class="hold-transition login-page">
    <!-- Site wrapper -->








    @yield('content')




    <!-- ./wrapper -->
    @include('dashboard.layouts.partials.main.scripts')
    @stack('scripts')
</body>

</html>
