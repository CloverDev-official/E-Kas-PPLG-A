<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? ucwords(str_replace(['-', '.'], ' ', Route::currentRouteName())) }}</title>
        <script src="https://cdn.jsdelivr.net/npm/iconify-icon@3.0.2/dist/iconify-icon.min.js"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body class="bg-background md:flex md:justify-start overflow-hidden" x-data="{openside: false}" x-init="$watch('open', value => sidebarOpen = value)" >
        <livewire:layouts.sidebar/>
        <main class="grow-7 p-4 " >
            <livewire:layouts.header/>
            {{ $slot }}
        </main>

        @livewireScripts
    </body>
</html>
