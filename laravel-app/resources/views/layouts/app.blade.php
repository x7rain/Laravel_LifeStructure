<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', "Life Structure")</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @yield('styles')
    @yield('scripts')
</head>
<body class="antialiased">
@include('layouts.header')
@auth
@include('layouts.navigation')
@endauth
<div class="page-wrapper">
    @yield('content')
</div>
@include('layouts.footer')
@livewireScripts
</body>
</html>
