<?php

use Livewire\Component;
use App\Models\Murid;
use App\Models\PembayaranMinggu;
use App\Models\RiwayatTransaksi;
use App\Models\TotalKas;

new class extends Component
{
    public $jumlahMurid;
    public $sudahBayar;
    public $belumBayar;

    public $pemasukan = [];
    public $pengeluaran = [];

    public $totalKas;
    public $totalPemasukan;
    public $totalPengeluaran;

    public function mount()
    {
        $this->jumlahMurid = Murid::count();

        $siswaSudahBayar = PembayaranMinggu::where('minggu_ke', '>', 0)
            ->where('status', 'lunas')
            ->distinct('murid_id')
            ->count('murid_id');

        $this->sudahBayar = $siswaSudahBayar;
        $this->belumBayar = $this->jumlahMurid - $this->sudahBayar;

        $this->loadChartData();
        $this->loadKasData();
    }

    public function loadChartData()
    {
        $months = collect(range(1, 12));

        $this->pemasukan = $months->map(function ($month) {

            return RiwayatTransaksi::where('tipe', 'pemasukan')
                ->whereMonth('tanggal_waktu', $month)
                ->sum('jumlah');

        })->toArray();

        $this->pengeluaran = $months->map(function ($month) {

            return RiwayatTransaksi::where('tipe', 'pengeluaran')
                ->whereMonth('tanggal_waktu', $month)
                ->sum('jumlah');

        })->toArray();
    }

    public function loadKasData()
    {
        $kas = TotalKas::first();
        $this->totalKas = $kas ? $kas->total_saldo : 0;

        $this->totalPemasukan = RiwayatTransaksi::where('tipe', 'pemasukan')
            ->sum('jumlah');

        $this->totalPengeluaran = RiwayatTransaksi::where('tipe', 'pengeluaran')
            ->sum('jumlah');
    }
};