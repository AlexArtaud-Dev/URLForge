<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config("app.name") }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
    @vite('resources/css/no-auth.css')
    @vite(['resources/js/app.js'])
    @livewireStyles
    <script async src="{{ Vite::asset('resources/js/ripple.js') }}"></script>
    @yield('styles')
</head>
<body class="font-sans antialiased dark:bg-black bg-white dark:text-white/50">
    <div class="h-[100vh] min-w-full flex flex-col">
        <x-not-authenticated.header />
        @yield('content')
    </div>
    <x-not-authenticated.footer />
    <x-toaster-hub />
    @yield('scripts')
    @livewireScripts
</body>
</html>
