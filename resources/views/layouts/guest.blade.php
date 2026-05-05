<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Kas PPLG A</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gradient-to-br from-blue-500 to-purple-600">
    <div class="min-h-screen flex items-center justify-center p-4">
        {{ $slot }}
    </div>
    @livewireScripts
</body>
</html>