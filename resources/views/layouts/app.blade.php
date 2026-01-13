<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>@yield('titulo', 'Monitoreo Refrescos BT')</title>
        {{-- CSS --}}
        <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
        {{-- Vite Tailwind --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    
    <body>
        {{-- Barra de navegación --}}
        <header>
            @include('layouts.navigation')
        </header>
        {{-- Contenido principal --}}
        <main>
            @yield('contenido')
        </main>
        
        <footer>
            @include('layouts.footer')
        </footer>
    </body>
    </html>


