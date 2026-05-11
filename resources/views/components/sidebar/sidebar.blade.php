<div>
    <!-- DEKSTOP MODE -->
    <div class="hidden md:flex flex-col w-64 h-screen sticky top-0 overflow-y-auto bg-primary text-primaryForeground shadow-[6px_0_10px_rgba(0,0,0,0.1)]">
    
        <header class="p-4 border-b border-white">
            <h1 class="text-xl font-semibold">
                E-Kas XI PPLG A
            </h1>
        </header>
    
        <ul class="mt-2 flex-1 p-4 space-y-2 list-none">

            <!-- DASHBOARD -->
            <x-nav-link
                href="{{route('dashboard')}}"
                icon="dashboard"
                >
    
                Dashboard
    
            </x-nav-link>
    
            <!-- KAS GROUP -->
            <li x-data="{ open: {{ request()->routeIs('*-kas') ? 'true' : 'false' }} }" >
                <!-- button -->
                <button
                    @click="open = !open"
                    class="flex items-center justify-between w-full px-4 py-2 text-white hover:bg-primaryHover rounded-full"
                >
                    <span class="flex gap-2 items-center capitalize font-bold">
                        <iconify-icon :icon="open ? 'mdi:wallet' : 'mdi:wallet-outline'" width="24" height="24"></iconify-icon>
                        manajemen KAS
                    </span>

                    <iconify-icon class="transition-transform" :class="{ 'rotate-180': open }" icon="lineicons:chevron-up" width="25" height="24"></iconify-icon>
                </button>

                <!-- list sub menu -->
                <ul x-show="open" x-transition class="ml-4 mt-2 flex flex-col gap-2" style="display: none;" >

                    <!-- PEMASUKAN -->
                    <x-nav-link
                        href="{{ route('pemasukan-kas') }}"
                        icon="pemasukan">
            
                        Pemasukan 
            
                    </x-nav-link>

                    <!-- PENGELUARAN -->
                    <x-nav-link
                        href="{{ route('pengeluaran-kas') }}"
                        icon="pengeluaran">
            
                        Pengeluaran 
            
                    </x-nav-link>

                    <!-- RIWAYAT -->
                    <x-nav-link
                        href="{{ route('riwayat-kas') }}"
                        icon="riwayat">

                        Riwayat 
            
                    </x-nav-link>

                </ul>
            </li>                  
        </ul>
    
        <footer class="p-2 border-t border-white">
            <a href="{{ route('profil') }}" wire:navigate >
                <div class="p-2 rounded-lg flex items-center justify-start gap-2 transition-all duration-100 active:scale-95 active:bg-primary hover:bg-primaryHover">
                    <!-- foto profil -->
                    <img src="{{ asset('img/Avatar.png') }}" alt="" class="w-8 h-8 rounded-full" >
    
                    <!-- keterangan -->
                    <div>
                        @php
                            $user = currentUser();
                        @endphp

                        <p class="text-secondaryForeground text-sm line-clamp-1 font-medium capitalize">
                            {{ $user->nama_lengkap }}
                        </p>

                        @if(isMurid())

                            <p class="text-secondaryForeground text-xs font-regular capitalize">
                                {{ $user->jenis_kelamin === 'L' ? 'Siswa' : 'Siswi' }}
                            </p>

                        @elseif(isBendahara())

                            <p class="text-secondaryForeground text-xs font-regular">
                                {{ $user->jabatan }}
                            </p>

                        @endif
                    </div>
                </div>
            </a>
        </footer>
    
    </div>

    <!-- MOBILE MODE -->
    <div class="md:hidden flex items-center justify-between p-4 bg-primary" >
        <a href="{{ route('profil') }}" wire:navigate>
            <!-- foto profil -->
            <img src="{{ asset('img/Avatar.png') }}" alt="" class="w-8 h-8 rounded-full" >
        </a>

        <!-- judul -->
        <h1 class="text-lg text-primaryForeground font-semibold">
            E-Kas XI PPLG A
        </h1>

        <!-- hamburger / bars -->
        <div>
            <!-- overlay -->
            <div 
                x-show="openside"
                @click="open = false; $dispatch('sidebar-toggle', open)"
                style="display: none;"
                x-transition.opacity
                class="fixed z-40 inset-0 bg-black/40 overflow-hidden">
            </div>

            <!-- button -->
            <button class="block md:hidden text-white"  @click="openside = !openside">
                <iconify-icon icon="lineicons:menu-hamburger-1" width="32" height="32" class="  hover:opacity-75" ></iconify-icon>
            </button>

            <!-- sidebar -->
            <div
                x-show="openside"
                x-transition:enter="transition transform duration-300"
                x-transition:enter-start="translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition transform duration-300"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-full"
                @click.outside="openside = false"
                style="display: none;"
                class="fixed top-0 right-0 w-[15rem] z-50 bg-primary flex flex-col h-screen overflow-y-auto"
            
            >
                <header class="p-4 border-b border-white">
                    <h1 class="text-xl font-semibold text-white">
                        E-Kas XI PPLG A
                    </h1>
                </header>

                <ul class="mt-2 flex-1 p-4 space-y-2 list-none">

                    <!-- DASHBOARD -->
                    <x-nav-link
                        href="{{route('dashboard')}}"
                        icon="dashboard"
                        >
            
                        Dashboard
            
                    </x-nav-link>
                    
                    <!-- KAS GROUP -->
                    <li x-data="{ open: {{ request()->routeIs('*-kas') ? 'true' : 'false' }} }" >
                        <!-- button -->
                        <button
                            @click="open = !open"
                            class="flex items-center justify-between w-full px-4 py-2 text-white hover:bg-blue-deep-solid rounded-lg"
                        >
                            <span class="flex gap-2 items-center capitalize">
                                <iconify-icon :icon="open ? 'mdi:wallet' : 'mdi:wallet-outline'" width="24" height="24"></iconify-icon>
                                <p class="font-bold" >
                                    manajemen KAS   
                                </p>
                            </span>

                            <iconify-icon class="transition-transform" :class="{ 'rotate-180': open }" icon="lineicons:chevron-up" width="25" height="24"></iconify-icon>
                        </button>

                        <!-- list sub menu -->
                        <ul x-show="open" x-transition class="ml-4 mt-2 flex flex-col gap-2" style="display: none;" >

                            <!-- PEMASUKAN -->
                            <x-nav-link
                                href="{{ route('pemasukan-kas') }}"
                                icon="pemasukan">
                    
                                Pemasukan 
                    
                            </x-nav-link>

                            <!-- PENGELUARAN -->
                            <x-nav-link
                                href="{{ route('pengeluaran-kas') }}"
                                icon="pengeluaran">
                    
                                Pengeluaran 
                    
                            </x-nav-link>

                            <!-- RIWAYAT -->
                            <x-nav-link
                                href="{{ route('riwayat-kas') }}"
                                icon="riwayat">

                                Riwayat 
                    
                            </x-nav-link>

                        </ul>
                    </li>                 
                </ul>
            </div>
        </div>
    </div>
</div>