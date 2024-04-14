<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SkillsHub|Dashboard @yield('title')</title>
    @include('dashboard.layouts.partials.main.styles')
    @stack('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('dashboard.layouts.partials.main.navbar')
        <!-- Navbar -->
        <!-- Main Sidebar Container -->
        @include('dashboard.layouts.partials.main.sidebar')
        <!-- Main Sidebar Container -->

      @yield('content')


        <!-- footer -->
        @include('dashboard.layouts.partials.main.footer')
        <!-- footer -->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    @include('dashboard.layouts.partials.main.scripts')
    @stack('scripts')
</body>

</html>
