<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body{
            visibility: hidden;
        }
    </style>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- CDNS --}}
    @yield('cdns')
    
    {{-- Vite --}}
    @vite(['resources/js/app.js'])
    {{-- Script TomTom --}}
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox-web.js"></script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.1.2-public-preview.15/services/services-web.min.js"></script>
</head>

<body>
    <div id="app">
        {{-- Navbar --}}
        @include('includes.layouts.navbar')
        <!-- Main -->
        <main class="container py-3">
            {{-- Alerts --}}
            @include('includes.alerts')
            {{-- Content --}}
            @yield('content')
        </main>
    </div>
    {{-- Modale --}}
    @include('includes.flats.modal')
    {{-- Scripts --}}
    @yield('scripts')
</body>

</html>
