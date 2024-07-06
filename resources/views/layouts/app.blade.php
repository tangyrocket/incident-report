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

</head>

<body class="font-sans antialiased">

    @include('layouts.sidenav')

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex flex-col main-content">

        @isset($header)

        @include('layouts.navigation')

        @endisset

        @isset($head)

        <!-- Page Heading -->
        <header class="dark:bg-gray-800">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $head }}
            </div>
        </header>
        @endisset

        <main class="">
            {{ $slot }}
        </main>



    </div>

    </div>

    @stack('scripts')
</body>

</html>
