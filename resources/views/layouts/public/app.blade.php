<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Site')</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    @vite(['resources/css/app.scss', 'resources/js/app.js'])

    @stack('styles')
</head>
<body>

@include('layouts.public.header')

<main>
    @yield('content')
</main>

@include('layouts.public.footer')

@stack('scripts')
</body>
</html>
