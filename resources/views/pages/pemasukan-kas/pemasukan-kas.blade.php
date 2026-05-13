<div class="mt-5 flex gap-6 flex-col 2xl:flex-row">
    {{-- table form --}}
    <div class="p-5 bg-card border border-card shadow-md rounded-xl flex-3">
        {{-- navTable --}}
        <div class="flex justify-between items-center">
            <h2 class="font-heading text-cardForeground text-2xl font-medium">{{ $bulanNama }} {{ $tahun }}
            </h2>
            {{-- button --}}
            <div
                class="bg-card border border-card shadow-md rounded-sm flex justify-center items-center gap-10 p-[8.37px]">
                <button class="flex justify-center items-center"><iconify-icon icon="mdi:chevron-left" width="24"
                        height="24" class="text-icon"></iconify-icon></button>
                <button class="flex justify-center items-center"><iconify-icon icon="mdi:chevron-right" width="24"
                        height="24" class="text-icon"></iconify-icon></button>
            </div>
        </div>
        {{-- table --}}
        <div class="mt-5 overflow-x-auto">
            <table class="min-w-max w-full text-left font-label">
                <thead>
                    <tr>
                        <th class="text-center p-2 border border-muted border-l-0">Absen</th>
                        <th class="text-center p-2 border border-muted">Nama Murid</th>
                        <th class="text-center p-2 border border-muted">Minggu 1</th>
                        <th class="text-center p-2 border border-muted">Minggu 2</th>
                        <th class="text-center p-2 border border-muted">Minggu 3</th>
                        <th class="text-center p-2 border border-muted">Minggu 4</th>
                        <th class="text-center p-2 border border-muted border-r-0">Denda</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($murids as $murid)
                        @php
                            $w1 = $pembayaranMap[$murid->id . '_1'] ?? null;
                            $w2 = $pembayaranMap[$murid->id . '_2'] ?? null;
                            $w3 = $pembayaranMap[$murid->id . '_3'] ?? null;
                            $w4 = $pembayaranMap[$murid->id . '_4'] ?? null;
                        @endphp
                        <tr wire:key="murid-{{ $murid->id }}">
                            <td class="text-center p-2 border border-muted border-l-0 font-semibold">
                                {{ $murid->id }}</td>
                            <td class="p-2 border border-muted font-semibold">{{ $murid->nama_lengkap }}</td>
                            <td class="text-center p-2 border border-muted cursor-pointer hover:bg-primary/10 transition-colors"
                                wire:click="selectWeek({{ $murid->id }}, 1)">
                                @if ($w1)
                                    <span class="text-success font-bold">✓ Lunas</span>
                                @endif
                            </td>
                            <td class="text-center p-2 border border-muted cursor-pointer hover:bg-primary/10 transition-colors"
                                wire:click="selectWeek({{ $murid->id }}, 2)">
                                @if ($w2)
                                    <span class="text-success font-bold">✓ Lunas</span>
                                @endif
                            </td>
                            <td class="text-center p-2 border border-muted cursor-pointer hover:bg-primary/10 transition-colors"
                                wire:click="selectWeek({{ $murid->id }}, 3)">
                                @if ($w3)
                                    <span class="text-success font-bold">✓ Lunas</span>
                                @endif
                            </td>
                            <td class="text-center p-2 border border-muted cursor-pointer hover:bg-primary/10 transition-colors"
                                wire:click="selectWeek({{ $murid->id }}, 4)">
                                @if ($w4)
                                    <span class="text-success font-bold">✓ Lunas</span>
                                @endif
                            </td>
                            <td class="text-center p-2 border border-muted border-r-0 cursor-pointer hover:bg-destructive/10 transition-colors"
                                wire:click="selectDenda({{ $murid->id }})">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @if (currentGuard() === 'bendahara' || currentGuard() === 'admin')
        {{-- form kosong --}}
        @if ($formType === 'kosong')
            <div class="p-5 bg-card border border-card shadow-md rounded-xl flex-1">
                <div>
                    <h2 class="font-heading text-cardForeground text-2xl font-medium">Detail Form Siswa</h2>
                    <div class="flex justify-center items-center min-h-screen flex-col">
                        <iconify-icon icon="fluent:slide-text-cursor-20-regular" width="128" height="128"
                            class="text-icon"></iconify-icon>
                        <p class="font-label text-mutedForeground text-2xl">Pilih salah satu di table</p>
                    </div>
                </div>
            </div>
        @endif

        {{-- form isi --}}
        @if ($formType === 'isi')
            <div class="p-5 bg-card border border-card shadow-md rounded-xl flex-1">
                <div>
                    <h2 class="font-heading text-cardForeground text-2xl font-medium">Detail Form Siswa</h2>
                    <p class="font-label text-mutedForeground">Minggu {{ $selectedWeek }}</p>
                </div>
                <div class="mt-5">
                    <div
                        class="flex bg-primary/25 border border-card justify-start items-center gap-2 rounded-full px-3 py-2">
                        <div class="flex justify-center items-center">
                            <iconify-icon icon="mdi:user-circle" width="32" height="32" class="text-icon">
                            </iconify-icon>
                        </div>
                        <div>
                            <p class="font-label">{{ $selectedMuridId }}. {{ $selectedMuridName }}</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h3 class="font-label font-medium">Metode Pembayaran</h3>
                        <div class="flex gap-2 mt-2">
                            <button wire:click="setMetode('tunai')" type="button"
                                class="border border-success rounded-md flex-1 py-1 font-bold transition-all
                                {{ $metode === 'tunai' ? 'bg-success text-white' : 'bg-success/25 text-success' }}">
                                Tunai
                            </button>
                            <button wire:click="setMetode('qris')" type="button"
                                class="group border border-primary rounded-md flex-1 py-1 flex justify-center items-center gap-2 transition-all
                                {{ $metode === 'qris' ? 'bg-primary text-white' : 'bg-primary/25' }}">
                                <img src="{{ asset('img/qris.png') }}" alt="QRIS" width="82.5"
                                    class="transition-all duration-200
                                    {{ $metode === 'qris' ? 'brightness-0 invert' : 'group-hover:brightness-0 group-hover:invert' }}">
                            </button>
                        </div>
                        @error('metode')
                            <p class="text-destructive text-sm mt-1 font-label">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mt-5">
                    <h3 class="font-label font-medium">Keterangan</h3>
                    <textarea wire:model="keterangan"
                        class="border border-muted rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-ring mt-2 w-full h-24"
                        placeholder="Contoh: Bayar satu minggu"></textarea>
                </div>
                <div class="mt-5">
                    <div class="flex gap-2">
                        <button wire:click="batal" type="button"
                            class="border border-muted rounded-md flex-1 py-2 hover:bg-destructiveHover hover:text-white transition-colors">Batal</button>
                        <button wire:click="save" type="button"
                            class="border border-success bg-success text-successForeground rounded-md flex-1 py-2 hover:bg-successHover transition-colors">Simpan</button>
                    </div>
                </div>
            </div>
        @endif

        {{-- form denda --}}
        @if ($formType === 'denda')
            <div class="p-5 bg-card border border-card shadow-md rounded-xl flex-1">
                <div>
                    <h2 class="font-heading text-cardForeground text-2xl font-medium">Detail Form Siswa</h2>
                    <p class="font-label text-mutedForeground">Denda</p>
                </div>
                <div class="mt-5">
                    <div
                        class="flex bg-primary/25 border border-card justify-start items-center gap-2 rounded-full px-3 py-2">
                        <div class="flex justify-center items-center">
                            <iconify-icon icon="mdi:user-circle" width="32" height="32" class="text-icon">
                            </iconify-icon>
                        </div>
                        <div>
                            <p class="font-label">{{ $selectedMuridId }}. {{ $selectedMuridName }}</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h3 class="font-label font-medium">Metode Pembayaran</h3>
                        <div class="flex gap-2 mt-2">
                            <button wire:click="setMetode('tunai')" type="button"
                                class="border border-success rounded-md flex-1 py-1 font-bold transition-all
                                {{ $metode === 'tunai' ? 'bg-success text-white' : 'bg-success/25 text-success' }}">
                                Tunai
                            </button>
                            <button wire:click="setMetode('qris')" type="button"
                                class="group border border-primary rounded-md flex-1 py-1 flex justify-center items-center gap-2 transition-all
                                {{ $metode === 'qris' ? 'bg-primary text-white' : 'bg-primary/25' }}">
                                <img src="{{ asset('img/qris.png') }}" alt="QRIS" width="82.5"
                                    class="transition-all duration-200
                                    {{ $metode === 'qris' ? 'brightness-0 invert' : 'group-hover:brightness-0 group-hover:invert' }}">
                            </button>
                        </div>
                        @error('metode')
                            <p class="text-destructive text-sm mt-1 font-label">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mt-5">
                    <h3 class="font-label font-medium">Jumlah Denda</h3>
                    <input type="number" wire:model="jumlah_denda" placeholder="Contoh: 3000"
                        class="border border-muted rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-ring mt-2 w-full">
                    @error('jumlah_denda')
                        <p class="text-destructive text-sm mt-1 font-label">{{ $message }}</p>
                    @enderror
                    <h3 class="font-label font-medium mt-6">Keterangan</h3>
                    <textarea wire:model="keterangan"
                        class="border border-muted rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-ring mt-2 w-full h-24"
                        placeholder="Contoh: Bayar denda"></textarea>
                </div>
                <div class="mt-5">
                    <div class="flex gap-2">
                        <button wire:click="batal" type="button"
                            class="border border-muted rounded-md flex-1 py-2 hover:bg-destructiveHover hover:text-white transition-colors">Batal</button>
                        <button wire:click="saveDenda" type="button"
                            class="border border-success bg-success text-successForeground rounded-md flex-1 py-2 hover:bg-successHover transition-colors">Simpan</button>
                    </div>
                </div>
            </div>
        @endif

        {{-- form edit --}}
        @if ($formType === 'edit')
            @php
                $isEdited = $metode !== $originalMetode || $keterangan !== $originalKeterangan;
            @endphp
            <div class="p-5 bg-card border border-card shadow-md rounded-xl flex-1">
                <div>
                    <h2 class="font-heading text-cardForeground text-2xl font-medium">Detail Form Siswa</h2>
                    <p class="font-label text-mutedForeground">
                        @if ($selectedWeek && $selectedWeek > 0)
                            Minggu {{ $selectedWeek }}
                        @else
                            Denda
                        @endif
                    </p>
                </div>
                <div class="mt-5">
                    <div
                        class="flex bg-primary/25 border border-card justify-start items-center gap-2 rounded-full px-3 py-2">
                        <div class="flex justify-center items-center">
                            <iconify-icon icon="mdi:user-circle" width="32" height="32" class="text-icon">
                            </iconify-icon>
                        </div>
                        <div>
                            <p class="font-label">{{ $selectedMuridId }}. {{ $selectedMuridName }}</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h3 class="font-label font-medium">Metode Pembayaran</h3>
                        <div class="flex gap-2 mt-2">
                            <button wire:click="setMetode('tunai')" type="button"
                                class="border border-success rounded-md flex-1 py-1 font-bold transition-all
                                {{ $metode === 'tunai' ? 'bg-success text-white' : 'bg-success/25 text-success' }}">
                                Tunai
                            </button>
                            <button wire:click="setMetode('qris')" type="button"
                                class="group border border-primary rounded-md flex-1 py-1 flex justify-center items-center gap-2 transition-all
                                {{ $metode === 'qris' ? 'bg-primary text-white' : 'bg-primary/25' }}">
                                <img src="{{ asset('img/qris.png') }}" alt="QRIS" width="82.5"
                                    class="transition-all duration-200
                                    {{ $metode === 'qris' ? 'brightness-0 invert' : 'group-hover:brightness-0 group-hover:invert' }}">
                            </button>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <h3 class="font-label font-medium">Keterangan</h3>
                    <textarea wire:model="keterangan"
                        class="border border-muted rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-ring mt-2 w-full h-24"
                        placeholder="Keterangan pembayaran">{{ $keterangan }}</textarea>
                </div>
                <div class="mt-5">
                    <div class="flex gap-2">
                        <button wire:click="batal" type="button"
                            class="border border-muted rounded-md flex-1 py-2 hover:bg-destructiveHover hover:text-white transition-colors">Batal</button>
                        @if ($isEdited)
                            <button wire:click="update" type="button"
                                class="border border-success bg-success text-successForeground rounded-md flex-1 py-2 hover:bg-successHover transition-colors">Simpan</button>
                        @else
                            <button wire:click="update" type="button"
                                class="border border-primary bg-primary text-primaryForeground rounded-md flex-1 py-2 hover:bg-primaryHover transition-colors">Edit</button>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    @endif
</div>
