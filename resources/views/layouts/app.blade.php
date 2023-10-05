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
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-cover bg-[url('https://img.freepik.com/free-photo/blank-letter-stationery-set_53876-147796.jpg?w=1380&t=st=1695230061~exp=1695230661~hmac=67849dc4dcf510615f84a13fd06c3ce8e3f71aea56c0bbb3ad96c7dbc051df61')]">
        @include('layouts.navigation.aside')
        @include('layouts.navigation.mobile')

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
