<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        <!-- Tailwind CSS CDN for instant styling -->
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- Alpine.js for interactivity (modals, etc.) -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script src="/app.js" defer></script>
    </head>
    <body class="min-h-screen w-full bg-gradient-to-br from-indigo-900 via-purple-900 to-gray-900">
        @include('layouts.navigation')
        <main class="w-full py-4 mx-auto">
            @yield('content')
        </main>
    </body>
</html>
