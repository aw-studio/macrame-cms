<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @if (isset($meta))
            {{ $meta }}
        @endif
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <!-- Page Heading -->
            @include('layouts.header')
            <!-- Page Content -->
            <main class="mt-[90px] lg:mt-[189px]">
                {{ $slot }}
            </main>
            <x-footer />
        </div>
    </body>
</html>
