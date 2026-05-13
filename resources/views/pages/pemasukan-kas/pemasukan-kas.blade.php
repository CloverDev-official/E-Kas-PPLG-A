<div class="mt-5 flex gap-6 flex-col 2xl:flex-row">
    {{-- table form --}}
    <div class="p-5 bg-card border border-card shadow-md rounded-xl flex-3">
        {{-- navTable --}}
        <div class="flex justify-between items-center">
            <h2 class="font-heading text-cardForeground text-2xl font-medium">Mei 2026</h2>
            {{-- button --}}
            <div
                class="bg-card border border-card shadow-md rounded-sm flex justify-center items-center gap-10 p-[8.37px]">
                <button class="flex justify-center items-center "><iconify-icon icon="mdi:chevron-left" width="24"
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
                        <tr>
                            <td class="text-center p-2 border border-muted border-l-0 font-semibold">
                                {{ $murid->id }}</td>
                            <td class="p-2 border border-muted font-semibold">{{ $murid->nama_lengkap }}</td>
                            <td class="text-center p-2 border border-muted"></td>
                            <td class="text-center p-2 border border-muted"></td>
                            <td class="text-center p-2 border border-muted"></td>
                            <td class="text-center p-2 border border-muted"></td>
                            <td class="text-center p-2 border border-muted border-r-0"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- form --}}
    <div class="p-5 bg-card border border-card shadow-md rounded-xl flex-1 h-fit">
        {{-- title --}}
        <div>
            <h2 class="font-heading text-cardForeground text-2xl font-medium">Detail Form Siswa</h2>
            <p class=" font-label text-mutedForeground">Minggu 1</p>
        </div>
        {{-- metode --}}
        <div class="mt-5">
            <div class="flex bg-primary/25 border border-card justify-start items-center gap-2 rounded-full px-3 py-2">
                <div class="flex justify-center items-center">
                    <iconify-icon icon="mdi:user-circle" width="32" height="32" class="text-icon">
                    </iconify-icon>
                </div>
                <div>
                    <p class="font-label">1. Ahmad Aditya Alfaris</p>
                </div>
            </div>
            <div class="mt-4">
                <h3 class="font-label font-medium">Metode Pembayaran</h3>
                <div class="flex gap-2 mt-2">
                    <button
                        class="bg-success/25 border border-success rounded-md flex-1 py-1 font-bold text-success">Tunai</button>
                    <button
                        class="bg-primary/25 border border-primary rounded-md flex-1 py-1 flex justify-center items-center gap-2">
                        <img src="{{ asset('img/qris.png') }}" alt="QRIS" width="82.5">
                    </button>
                </div>
            </div>
        </div>
        {{-- keterangan --}}
        <div class="mt-5">
            <h3 class="font-label font-medium">Keterangan</h3>
            <textarea
                class="border border-muted rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-ring mt-2 w-full h-24"
                placeholder="Contoh: Bayar satu minggu"></textarea>
        </div>
        {{-- button --}}
        <div class="mt-5">
            <div class="flex gap-2">
                <button
                    class="border border-muted rounded-md flex-1 py-2 hover:bg-destructiveHover hover:text-white transition-colors">Batal</button>
                <button
                    class="border border-success bg-success text-successForeground rounded-md flex-1 py-2 hover:bg-successHover transition-colors ">Simpan</button>
            </div>
        </div>
    </div>
</div>
