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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <!-- Scripts -->
        @vite(['resources/scss/app.scss', 'resources/scss/dashboard.scss', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg')] dark:bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern-dark.svg')]">
        <div class="min-h-screen ">
            @include('layouts.navigation.aside')
            @include('layouts.navigation.mobile')

            <!-- Page Content -->
            <main class="py-6 mb-28 md:ml-80 md:mb-0">
                {{ $slot }}
            </main>
        </div>

        <script src="{{ asset('js/public.js') }}" type="module"></script>
    </body>
</html>
