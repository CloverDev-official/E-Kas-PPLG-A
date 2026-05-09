<div class="min-h-screen mt-5 space-y-5  ">
    <!-- card keterangan siswa container -->
    <div class="grid grid-cols-3 gap-2 md:gap-5" >
        <!-- card jumlah siswa -->
        <div class="bg-secondary rounded-xl md:rounded-br-sm px-4 py-5 shadow-md flex flex-col" >
            <div class="flex items-center justify-start gap-2 pb-2 text-white border-b border-white">
                <iconify-icon icon="mdi:user" width="24" height="24" class="hidden md:block"></iconify-icon>
                <h1 class="font-medium text-xs md:text-md capitalize">jumlah murid</h1>
            </div>
            <div class="flex items-center justify-center flex-1 p-2 text-white text-2xl md:text-h1 font-bold">
                {{ $jumlahMurid }}
            </div>
        </div>
        <!-- card sudah bayar -->
        <div class="bg-success rounded-xl md:rounded-br-sm px-4 py-5 shadow-md flex flex-col" >
            <div class="flex items-center justify-start gap-2 pb-2 text-white border-b border-white">
                <iconify-icon icon="mdi:check-circle" width="24" height="24" class="hidden md:block"></iconify-icon>
                <h1 class="font-medium text-xs md:text-md capitalize">sudah bayar</h1>
            </div>
            <div class="flex items-center justify-center flex-1 p-2 text-white text-2xl md:text-h1 font-bold">
                {{ $sudahBayar }}
            </div>
        </div>
        <!-- card belum bayar -->
        <div class="bg-warning rounded-xl md:rounded-br-sm px-4 py-5 shadow-md flex flex-col" >
            <div class="flex items-center justify-start gap-2 pb-2 text-white border-b border-white">
                <iconify-icon icon="mdi:do-not-disturb-on" width="24" height="24" class="hidden md:block"></iconify-icon>
                <h1 class="font-medium text-xs md:text-md capitalize">belum bayar</h1>
            </div>
            <div class="flex items-center justify-center flex-1 p-2 text-white text-2xl md:text-h1 font-bold">
                {{ $belumBayar }}
            </div>
        </div>
    </div>

    <!-- container kas -->
    <div class="grid grid-cols-1 {{ auth()->user()->role === 'bendahara' ? 'md:grid-cols-3' : '' }}  gap-5">
        @if (auth()->user()->role === 'bendahara')
            <!-- chart total dan pengeluaran kas -->
            <div class="bg-card shadow-md p-4 pt-8 rounded-xl rounded-tr-sm col-span-2">
                <div 
                wire:ignore 
                id="chart"
                data-pemasukan='@json($pemasukan)'
                data-pengeluaran='@json($pengeluaran)'
                class="w-full h-80"></div>
            </div>
        @endif
        <!-- container pengekuaran dan pemasukan -->
        <div class="grid {{ auth()->user()->role === 'bendahara' ? 'md:grid-cols-1' : 'grid-cols-2' }}  grid-cols-1 gap-2 md:gap-5">
            <!-- card pemasukan -->
            <div class="bg-primary rounded-xl md:rounded-br-sm px-4 py-5 shadow-md flex flex-col" >
                <div class="flex items-center justify-start gap-2 pb-2 text-white border-b border-white">
                    <iconify-icon icon="mdi:arrow-up-bold-circle" width="24" height="24" class="hidden md:block"></iconify-icon>
                    <h1 class="font-medium text-xs md:text-md capitalize">total pemasukan</h1>
                </div>
                <div class="flex items-center justify-center flex-1 p-2 text-white text-2xl md:text-h1 font-bold">
                    Rp {{ number_format($totalPemasukan, 0, ',', '.') }}
                </div>

            </div>
            <!-- card pengeluaran -->
            <div class="bg-destructive rounded-xl md:rounded-br-sm px-4 py-5 shadow-md flex flex-col" >
                <div class="flex items-center justify-start gap-2 pb-2 text-white border-b border-white">
                    <iconify-icon icon="mdi:arrow-down-bold-circle" width="24" height="24" class="hidden md:block"></iconify-icon>
                    <h1 class="font-medium text-xs md:text-md capitalize">total pengeluaran</h1>
                </div>
                <div class="flex items-center justify-center flex-1 p-2 text-white text-2xl md:text-h1 font-bold">
                    Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}
                </div>

            </div>
        </div>
    </div>
    <!-- container transaksi terbaru -->
    <div class="bg-card p-4 rounded-xl shadow-md">
        <div class="flex justify-between items-center border-b-2 border-divider pb-3">
            <div class="flex items-center gap-1 justify-start">
                <iconify-icon icon="mdi:history" width="24" height="24" class="mt-1" ></iconify-icon>
                <p class="capitalize text-h4 font-reguler  text-cardForeground">transaksi terbaru</p>
            </div>
        </div>
    </div>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
            Logout
        </button>
    </form>
</div>
