<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Laravel @yield('title')</title>
    {{--подключение подшаблона с метатегами и стилями--}}
    @include('shared.meta_styles')
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title">
            Laravel Organizer
        </div>

        <div class="links">
            <a href="{{ route('tasks.index') }}">Задачи</a>
            <a href="{{ route('about') }}">about</a>
        </div>
        <div class="container mt-4">
            {{-- Вывод флеш сообщения --}}
            @if (Session::has('flash_message'))
                <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
            @endif
            <h1>@yield('header')</h1>
            <hr>
            <div class="contentLeft">
                @yield('content')
            </div>
        </div>
    </div>
</div>
</body>
</html>

<!--
Директива yield. Она указывает на то, куда будет вставлен конкретный контент
конкретного обработчика, его шаблона. В качестве аргумента, она принимает название
из шаблона, к которому макет подключен, заданное там функцией section.
-->
