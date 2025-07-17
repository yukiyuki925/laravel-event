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
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- Alpine.js --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-200">
        <header class="bg-white shadow">
            <div class="flex justify-between items-center">
                <div class="max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
                    <a href="{{ route('index')}}">イベント</a>
                </div>
                <div class="max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
                    @include('components.nav')
                </div>
            </div>
        </header>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
