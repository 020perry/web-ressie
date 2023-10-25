<!DOCTYPE html>
<html data-theme="retro" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'webRessie') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js' ])
</head>


<!-- This is an example component -->
<div>
    <!-- Navigation -->
    @auth
        @include('layouts.navigation')

        <div class="flex overflow-hidden bg-white pt-16">
            @include('layouts.sidebar')
            @endauth
            @yield('content')

        </div>
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
</div>


</html>
