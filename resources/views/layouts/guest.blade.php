<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Kas PPLG A</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-[#77C1FF]">
    <div class="min-h-screen flex items-center justify-center p-4">
        {{ $slot }}
    </div>
    @livewireScripts
</body>
</html>