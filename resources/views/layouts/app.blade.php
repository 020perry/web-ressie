<!DOCTYPE html>
<html data-theme="dracula" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'webRessie') }}</title>

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js' ])
</head>

<body class="bg-base-200 text-base-content flex flex-col">
@include('layouts.navigation')
<div class="flex flex-1 flex-col">
    <!-- Page content -->
    <div class="flex-1">
        @yield('content')
    </div>
    <!-- Footer -->
    <footer class="footer bg-base-300 text-base-content w-full">
        @include('layouts.footer')
    </footer>
</div>
@stack('scripts')

</body>

</html>
