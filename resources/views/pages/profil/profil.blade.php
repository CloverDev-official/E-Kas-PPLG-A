<div class="mt-5 space-y-5">
    <!-- card profil -->
    <div class="bg-white rounded-lg p-4 md:px-20 relative flex items-center justify-start overflow-hidden shadow-md">
        <img src="{{ asset('img/Rectangle 37.png')}}" class="w-full h-1/3 absolute top-0 left-0 z-0" alt="">
        <!-- profil -->
        <div class="flex flex-col justify-center items-center gap-5 z-10 my-12">
            <img src="{{ asset('img/Avatar.png') }}" class="w-32 h-32 rounded-full border-2 border-gray-200 shadow-md" alt="">

            @php
            $user = currentUser();
            @endphp
            <!-- nama user dan jabatan/jk -->
            <div class="space-y-2">

                <h2 class="text-center font-label font-medium text-xl">{{ $user->nama_lengkap }}</h2>
                <!-- role -->
                <div class="flex justify-center items-center gap-2">
                    @if (isMurid())
                    <div class="rounded-full px-4 py-1 text-white text-sm bg-accentForeground capitalize">{{ $user->jenis_kelamin === 'L' ? 'siswa' : 'siswi' }}</div>
                    @elseif(isBendahara())
                    <div class="rounded-full px-4 py-1 text-white text-sm bg-accentForeground capitalize">siswa</div>
                    @endif

                    @if (isBendahara())
                    <div class="rounded-full px-4 py-1 text-white text-sm bg-amber-600">{{ $user->jabatan }}</div>
                    @endif
                </div>
            </div>
            <!-- username/id -->
            <div class="space-y-1">
                <p class="font-reguler text-sm text-gray-400">ID/Username Login:</p>
                @if (isMurid())
                <p class="font-semibold text-center text-md text-mutedForeground">{{ $user->nipd }}</p>
                @elseif (isBendahara())
                <p class="font-semibold text-center text-md text-mutedForeground">{{ $user->usn }}</p>
                @endif
            </div>
        </div>
    </div>
    <!-- settings -->
    <div class="bg-white rounded-lg p-4 relative flex flex-col gap-4 items-center justify-start overflow-hidden shadow-md">
        <!-- edit password -->
        <div class="w-full px-4 py-2 rounded-xl bg-surfaceSubtle border border-gray-200" x-data="{open:false}">
            <div class="justify-between items-center duration-200" x-transition :class="open ? 'hidden' : 'flex'">
                <!-- password -->
                <div>
                    <p class="text-foreground text-md capitalize flex items-center justify-start gap-1">
                        <iconify-icon icon="mdi:shield-lock-open" width="24" height="24"></iconify-icon>
                        ganti password
                    </p>
                </div>
                <!-- btn edit  -->
                <button @click="open  = ! open">
                    <iconify-icon :icon="open ? 'ri:arrow-up-s-line' : 'ri:arrow-down-s-line' " class="text-3xl text-gray-400 transition-transform duration-200"></iconify-icon>
                </button>
            </div>
            <div class="duration-200" x-collapse x-transition x-show="open">
                <p class="text-md text-foreground capitalize flex items-center justify-start gap-1">
                    <iconify-icon icon="mdi:shield-lock-open" width="24" height="24"></iconify-icon>
                    ganti password
                </p>
                <form class="flex flex-col space-y-5">
                    <div class="space-y-4 mt-5">

                        <!-- Password Baru -->
                        <div class="relative" x-data="{ open: false }">
                            <input
                                required
                                wire:model="password_baru"
                                :type="open ? 'text' : 'password'"
                                placeholder="Masukkan Password Baru"
                                class="w-full border-2 focus:outline-none border-gray-400 text-foreground rounded-xl p-4 pr-14 text-lg bg-white">

                            <button
                                type="button"
                                @click="open = !open"
                                class="absolute right-5 top-1/2 -translate-y-1/2">
                                <iconify-icon
                                    :icon="open ? 'ri:eye-fill' : 'iconoir:eye-closed'"
                                    class="transition-transform duration-200 text-3xl text-gray-400"></iconify-icon>
                            </button>
                        </div>

                        @error('konfirmasi_password')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror

                        <!-- Konfirmasi Password -->
                        <div class="relative" x-data="{ open: false }">
                            <input
                                required
                                wire:model="konfirmasi_password"
                                :type="open ? 'text' : 'password'"
                                placeholder="Konfirmasi Password"
                                class="w-full border-2 focus:outline-none border-gray-400 text-foreground rounded-xl p-4 pr-14 text-lg bg-white">

                            <button
                                type="button"
                                @click="open = !open"
                                class="absolute right-5 top-1/2 -translate-y-1/2">
                                <iconify-icon
                                    :icon="open ? 'ri:eye-fill' : 'iconoir:eye-closed'"
                                    class="transition-transform duration-200 text-3xl text-gray-400"></iconify-icon>
                            </button>
                        </div>

                    </div>
                    <div class="flex justify-between items-center">
                        <button type="button" class="bg-muted p-2 rounded-lg text-foreground transition-colors duration-150 hover:bg-iconMuted hover:text-white active:scale-95 flex items-center gap-1" @click="open = false">
                            <iconify-icon icon="ri:close-fill" class="text-xl mt-px"></iconify-icon>
                            <p class="capitalize">cancel</p>

                        </button>
                        <button wire:click="updatePassword" type="submit" class="p-2 rounded-lg bg-success  transition-colors duration-150 hover:bg-successHover active:scale-95 text-white flex items-center gap-1" @click="open = false">
                            <iconify-icon icon="ri:save-line" class="text-xl"></iconify-icon>
                            <p class="capitalize">simpan perubahan</p>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- tentang website -->
        <div class="w-full px-4 py-2 rounded-xl bg-surfaceSubtle border border-gray-200" x-data="{open : false}">
            <div class="flex justify-between items-center">
                <!-- information -->
                <div class="text-foreground text-md capitalize flex items-center justify-start gap-1">
                    <iconify-icon icon="mdi:information" width="24" height="24"></iconify-icon>
                    <p class="capitalize">tentang website</p>
                </div>
                <!-- btn dropdown -->
                <button @click="open  = ! open">
                    <iconify-icon :icon="open ? 'ri:arrow-up-s-line' : 'ri:arrow-down-s-line' " class="text-3xl text-gray-400 transition-transform duration-200"></iconify-icon>
                </button>
            </div>
            <div class="mt-2 border-t  border-t-gray-200" x-show="open" x-collapse>
                <ul class="mt-2 space-y-2">
                    <li>
                        <a href="#" wire:navigate class="text-gray-400 flex items-center justify-between px-4 py-2 rounded-lg transition-colors duration-150 hover:bg-iconMuted hover:text-white ">
                            <p class=" capitalize">kebijakan privasi</p>
                            <iconify-icon icon="ri:share-box-line" class="text-3xl "></iconify-icon>
                        </a>
                    </li>
                    <li>
                        <a href="#" wire:navigate class="text-gray-400 flex items-center justify-between px-4 py-2 rounded-lg transition-colors duration-150 hover:bg-iconMuted hover:text-white ">
                            <p class=" capitalize">Syarat dan Ketentuan</p>
                            <iconify-icon icon="ri:share-box-line" class="text-3xl "></iconify-icon>
                        </a>
                    </li>
                    <li>
                        <a href="#" wire:navigate class="text-gray-400 flex items-center justify-between px-4 py-2 rounded-lg transition-colors duration-150 hover:bg-iconMuted hover:text-white ">
                            <p class=" capitalize">tentang website</p>
                            <iconify-icon icon="ri:share-box-line" class="text-3xl "></iconify-icon>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- btn logout -->
        <form method="POST" action="{{ route('logout') }}" class="w-full">
            @csrf
            <button type="submit" class="w-full px-4 py-3 rounded-xl bg-destructive/15 hover:bg-destructive/50 transition-all duration-150 active:scale-95 text-start">
                <div class="flex items-center justify-start gap-1">
                    <iconify-icon icon="mdi:logout" width="24" height="24"></iconify-icon>
                    Log out
                </div>
            </button>
        </form>
    </div>
</div>