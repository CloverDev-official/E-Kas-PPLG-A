<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Kas PPLG A</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100">
    <div class="min-h-screen p-6">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Dashboard Kas PPLG A</h1>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                        Logout
                    </button>
                </form>
            </div>
            <p class="text-gray-600">
                Selamat datang, 
                <span class="font-semibold">
                    @auth('siswa') {{ Auth::guard('siswa')->user()->nama_lengkap }} (Siswa) @endauth
                    @auth('guru') {{ Auth::guard('guru')->user()->nama_lengkap }} (Guru) @endauth
                    @auth('admin') {{ Auth::guard('admin')->user()->nama_lengkap }} (Admin) @endauth
                </span>
            </p>
            <div class="mt-4 p-4 bg-green-100 rounded">
                <p class="text-green-700">✅ Login berhasil! Anda sekarang berada di halaman dashboard.</p>
            </div>
        </div>
    </div>
    @livewireScripts
</body>
</html>