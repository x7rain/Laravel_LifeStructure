<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', "LifeController Structure")</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @yield('styles')
    @yield('scripts')
</head>
<body class="antialiased">
@include('layouts.header')
<div class="page-wrapper">
    <div class="messages">
        @foreach($errors->getMessages() as $message)
            <div class="message">
                {{implode(" ", $message)}}
            </div>
        @endforeach
    </div>
    <div class="page-content">
        @yield('content')
    </div>
</div>
@include('layouts.footer')
@livewireScripts
</body>
</html>
