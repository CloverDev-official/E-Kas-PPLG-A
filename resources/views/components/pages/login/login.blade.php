<div>

    <div
        class="bg-white rounded-2xl shadow-lg flex flex-col md:flex-row w-full overflow-hidden justify-center items-center">
        <div class="p-8 md:p-16 flex gap-4 flex-col">
            @if ($errorMessage)
                <div
                    class="bg-destructive border-destructive text-destructiveForeground px-4 py-3 rounded-xl mb-4 text-center">
                    {{ $errorMessage }}
                </div>
            @endif


            <div class="flex flex-col gap-16">
                <h1 class=" text-center font-heading font-semibold text-4xl text-cardForeground">Selamat datang di E-Kas
                </h1>
                <div class="leading-relaxed md:text-left text-center">
                    <h2 class="font-heading text-2xl text-cardForeground font-medium">Masuk</h2>
                    <h3 class="font-label text-md font-reguler text-mutedForeground">Silahkan masukkan NIS dan Password
                        Anda</h3>
                </div>
            </div>

            <form wire:submit.prevent="login" class="mt-10">

                <div class="mb-4">
                    <label class="block font-label font-reguler text-md">NIS :</label>
                    <input type="text" wire:model="username"
                        class="w-full border border-muted rounded-lg px-4 py-3 focus:outline-none focus:border-primary"
                        placeholder="Masukkan NIS Anda..." autofocus>
                    @error('username')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block font-label font-reguler text-md">Password :</label>
                    <input type="password" wire:model="password"
                        class="w-full border border-muted rounded-lg px-4 py-3 focus:outline-none focus:border-primary"
                        placeholder="Masukkan password Anda...">
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit"
                    class="btn-primary w-full py-3 rounded-lg cursor-pointer">
                    Masuk
                </button>
            </form>
        </div>

        <div class="hidden md:block">
            <img src="{{ asset('img/bg-login.png') }}" alt="Login Image">
        </div>

    </div>

</div>
