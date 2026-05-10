<?php

use Livewire\Component;

use App\Models\Murid;
use App\Models\RiwayatTransaksi;
use App\Models\PembayaranMurid;

new class extends Component
{
    public $jumlahMurid;
    public $sudahBayar;
    public $belumBayar;

    public $pemasukan = [];
    public $pengeluaran = [];

    public $totalPemasukan;
    public $totalPengeluaran;

    public function mount()
    {
        $this->jumlahMurid = Murid::count();

        $this->sudahBayar = PembayaranMurid::distinct('murid_id')
            ->count('murid_id');

        $this->belumBayar =
            $this->jumlahMurid - $this->sudahBayar;

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
        $this->totalPemasukan = RiwayatTransaksi::where('tipe', 'pemasukan')
            ->sum('jumlah');

        $this->totalPengeluaran = RiwayatTransaksi::where('tipe', 'pengeluaran')
            ->sum('jumlah');
    }
};