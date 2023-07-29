<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', "Life Structure")</title>
    <link rel="stylesheet" href="{{asset("/css/general.css")}}">
    @yield('styles')
    @livewireStyles
    <script src="{{asset('js/jquery.min.js')}}"></script>
    @yield('scripts')
</head>
<body class="antialiased">
    @include('layouts.header')
    <div class="page-wrapper">
        @yield('content')
    </div>
    @include('layouts.footer')
    @livewireScripts
</body>
<script defer src="https://unpkg.com/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</html>
