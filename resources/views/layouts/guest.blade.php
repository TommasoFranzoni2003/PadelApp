<!DOCTYPE html> <!-- layout per le operazioni di autenticazione -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Autenticazione</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- c -->
        <link rel="stylesheet" href="{{ asset('css/auth/loginLayout.css') }}">

        <!-- Bootstrap CSS -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />

        <!-- Scripts 
        @vite(['resources/css/app.css', 'resources/js/app.js']) -->

        <!-- Styles -->
        @yield('page-css')
        @stack('styles')
        @livewireStyles
    </head>

    <body class="font-sans antialiased">

        <!-- Video di sfondo -->
        <div class="video-wrapper">
            <video autoplay muted loop playsinline class="video-bg">
                <source src="{{ asset('video/videoPadel3.mov') }}" type="video/mp4">
            </video>
        </div>

        <!-- Contenitore centrale bianco con contenuto intercambiabile -->
        <div class="auth-container">
            <div class="auth-content">
                {{ $slot }}
            </div>
        </div>

        @livewireScripts
    </body>
</html>
