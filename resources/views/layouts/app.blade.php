<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config('app.name') }}</title>
        <script src="https://cdn.jsdelivr.net/npm/iconify-icon@3.0.2/dist/iconify-icon.min.js"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body class="md:flex md:justify-start md:gap-5 overflow-hidden" x-data="{openside: false}" x-init="$watch('open', value => sidebarOpen = value)" >
        <livewire:layouts.sidebar/>
        <main class="grow-7" >
            {{ $slot }}
        </main>

        @livewireScripts
    </body>
</html>
