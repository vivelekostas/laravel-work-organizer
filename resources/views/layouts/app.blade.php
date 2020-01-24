<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title> @yield('title') </title>
    @include('shared.meta_styles')
</head>
<body
    style="background-image: url('{{ asset('images/fon3.jpeg') }}');
        background-repeat: no-repeat;
        background-position: center;
        background-size: 50% 80%;">

<div id="app">
    @include('shared.navbar')
    <div class="container">
        @if (Session::has('flash_message'))
            <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
        @endif
    </div>
    <main class="container py-4">
        @yield('content')
    </main>
</div>

<footer class="footer modal-footer mt-auto py-3">
    <div class="container">
        <span class="text-muted">2020 год. Гребенюк Константин
            <a href="https://github.com/vivelekostas/laravel-work-organizer">GitHub</a></span>
    </div>
</footer>

</body>
</html>
