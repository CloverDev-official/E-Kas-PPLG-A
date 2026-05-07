<div>
    @if ($errorMessage)
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ $errorMessage }}
        </div>
    @endif

    <form wire:submit.prevent="login">
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Username / NIPD</label>
            <input type="text" wire:model="username"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500"
                placeholder="Masukkan username atau NIPD" autofocus>
            @error('username')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Password</label>
            <input type="password" wire:model="password"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500"
                placeholder="Masukkan password">
            @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit"
            class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-200">
            Login
        </button>
    </form>

    <div class="mt-6 text-center text-sm text-gray-600 border-t pt-4">
        <p class="font-semibold">Demo Akun:</p>
        <p class="text-xs mt-1">Siswa: NIPD <span class="font-mono">11107</span> | pw: <span
                class="font-mono">xipplga</span></p>
        <p class="text-xs">Guru: username <span class="font-mono">guru_bk</span> | pw: <span
                class="font-mono">admin123</span></p>
        <p class="text-xs">Admin: username <span class="font-mono">admin_sekolah</span> | pw: <span
                class="font-mono">admin123</span></p>
    </div>
</div>
