<div class="min-h-screen mt-5 space-y-5  ">
    <!-- card keterangan siswa container -->
    <div class="grid grid-cols-3 gap-2 md:gap-5" >
        <!-- card jumlah siswa -->
        <div class="bg-secondary rounded-xl px-4 py-5 shadow-md flex flex-col" >
            <div class="flex items-center justify-start gap-2 pb-2 text-white border-b border-white">
                <iconify-icon icon="mdi:user" width="24" height="24" class="hidden md:block"></iconify-icon>
                <h1 class="font-medium text-xs md:text-md capitalize font-body ">jumlah murid</h1>
            </div>
            <div class="flex items-center justify-center flex-1 p-2 text-white text-2xl md:text-h1 font-bold">
                {{ $jumlahMurid }}
            </div>
        </div>
        <!-- card sudah bayar -->
        <div class="bg-success rounded-xl px-4 py-5 shadow-md flex flex-col" >
            <div class="flex items-center justify-start gap-2 pb-2 text-white border-b border-white">
                <iconify-icon icon="mdi:check-circle" width="24" height="24" class="hidden md:block"></iconify-icon>
                <h1 class="font-medium text-xs md:text-md capitalize font-body ">sudah bayar</h1>
            </div>
            <div class="flex items-center justify-center flex-1 p-2 text-white text-2xl md:text-h1 font-bold">
                {{ $sudahBayar }}
            </div>
        </div>
        <!-- card belum bayar -->
        <div class="bg-warning rounded-xl px-4 py-5 shadow-md flex flex-col" >
            <div class="flex items-center justify-start gap-2 pb-2 text-white border-b border-white">
                <iconify-icon icon="mdi:clock" width="24" height="24" class="hidden md:block"></iconify-icon>
                <h1 class="font-medium text-xs md:text-md capitalize font-body ">belum bayar</h1>
            </div>
            <div class="flex items-center justify-center flex-1 p-2 text-white text-2xl md:text-h1 font-bold">
                {{ $belumBayar }}
            </div>
        </div>
    </div>
    @if (currentGuard() === 'bendahara')
        <!-- cpntainer chart total dan pengeluaran kas -->
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
    <div class="grid grid-cols-3 gap-2 md:gap-5">
        <!-- card pemasukan -->
        <div class="bg-purple rounded-xl px-4 py-5 shadow-md flex flex-col" >
            <div class="flex items-center justify-start gap-2 pb-2 text-white border-b border-white">
                <iconify-icon icon="mdi:trending-up" width="24" height="24" class="hidden md:block"></iconify-icon>
                <h1 class="font-medium text-xs md:text-md capitalize font-body ">total pemasukan</h1>
            </div>
            <div class="flex items-center justify-center flex-1 p-2 text-white text-2xl md:text-h1 font-bold">
                Rp {{ number_format($totalPemasukan, 0, ',', '.') }}
            </div>
        </div>
        <!-- card pengeluaran -->
        <div class="bg-destructive rounded-xl px-4 py-5 shadow-md flex flex-col" >
            <div class="flex items-center justify-start gap-2 pb-2 text-white border-b border-white">
                <iconify-icon icon="mdi:trending-down" width="24" height="24" class="hidden md:block"></iconify-icon>
                <h1 class="font-medium text-xs md:text-md capitalize font-body ">total pengeluaran</h1>
            </div>
            <div class="flex items-center justify-center flex-1 p-2 text-white text-2xl md:text-h1 font-bold">
                Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}
            </div>
        </div>
        <!-- card pengeluaran -->
        <div class="bg-primary rounded-xl px-4 py-5 shadow-md flex flex-col" >
            <div class="flex items-center justify-start gap-2 pb-2 text-white border-b border-white">
                <iconify-icon icon="mdi:account-balance-wallet" width="24" height="24" class="hidden md:block"></iconify-icon>
                <h1 class="font-medium text-xs md:text-md capitalize font-body ">total pengeluaran</h1>
            </div>
            <div class="flex items-center justify-center flex-1 p-2 text-white text-2xl md:text-h1 font-bold">
                Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}
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
            <a href="{{ route('history') }}">
                <div class="flex justify-center items-center text-mutedForeground font-reguler transition-all duration-150 hover:text-primaryHover" >
                    <p>Lihat semua</p>
                    <iconify-icon icon="mdi:chevron-right" class="mt-1"  width="24" height="24"></iconify-icon>
                </div>
            </a>
        </div>
        <div class="mt-2 flex flex-col gap-2" >
            <!-- pemasukan -->
            <div class="bg-success-secondary/15 px-4 py-2 rounded-full flex items-center justify-between">
                <!-- container keterangan,nama dan tanggal -->
                <div class="flex gap-2 items-center justify-start">
                    <div class="bg-success text-white  rounded-full p-1 w-8 h-8 flex items-center justify-center">
                        <iconify-icon icon="mdi:chevron-up" width="24" height="24"></iconify-icon>
                    </div>
                    <div>
                        <!--  keterangan dan nama -->
                        <p class="font-reguler text-md capitalize">Bayar kas - apri</p>
                        <!-- tanggal -->
                        <p class="text-sm font-reguler text-mutedForeground">9 mei 2026</p>
                    </div>
                </div>
                <!-- nominal -->
                <p class="text-success text-md font-reguler">+Rp.3.000</p>
            </div>

            <!-- pengeluaran -->
            <div class="bg-destructive-secondary/15 px-4 py-2 rounded-full flex items-center justify-between">
                <!-- container keterangan,nama dan tanggal -->
                <div class="flex gap-2 items-center justify-start">
                    <div class="bg-destructive text-white  rounded-full p-1 w-8 h-8 flex items-center justify-center">
                        <iconify-icon icon="mdi:chevron-down" width="24" height="24"></iconify-icon>
                    </div>
                    <div>
                        <!--  keterangan dan nama -->
                        <p class="font-reguler text-md capitalize">Bayar kas - apri</p>
                        <!-- tanggal -->
                        <p class="text-sm font-reguler text-mutedForeground">9 mei 2026</p>
                    </div>
                </div>
                <!-- nominal -->
                <p class="text-destructive text-md font-reguler">+Rp.3.000</p>
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
