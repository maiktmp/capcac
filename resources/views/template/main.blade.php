<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="#"/>
    <title>@yield('title', 'Comite de Agua')</title>
    <!-- Stylesheets -->
    @include('template.global_css')
    @stack('css')
</head>
<body>
<div class='main-container'>
    <header>
    </header>
    <section class="wrapper">
        @include('components.navbar')
        @yield('content')
        @include('components.footer')
    </section>
</div>
{{--<!-- Javascript -->--}}
@include('template.global_js')
@stack('scripts')
</body>
</html>
