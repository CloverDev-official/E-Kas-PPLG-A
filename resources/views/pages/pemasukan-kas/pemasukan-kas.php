<?php

use Livewire\Component;
use App\Models\Murid;
use App\Models\PembayaranMinggu;
use App\Models\RiwayatTransaksi;
use App\Models\TotalKas;
use Illuminate\Support\Facades\Auth;

new class extends Component
{
    public $murids = [];
    public $pembayaranMap = [];

    public $selectedMuridId = null;
    public $selectedMuridName = '';
    public $selectedWeek = null;
    public $formType = 'kosong';
    public $existingPaymentId = null;

    public $metode = '';
    public $keterangan = '';
    public $jumlah_denda = '';

    public $originalMetode = '';
    public $originalKeterangan = '';

    public $bulanAngka;
    public $bulanNama;
    public $tahun;
    public $jumlahPerMinggu = 3000;

    public function mount()
    {
        $bulanIndonesia = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember',
        ];

        $this->bulanAngka = now()->format('m');
        $this->bulanNama = $bulanIndonesia[(int)now()->format('n')];
        $this->tahun = now()->format('Y');

        $this->murids = Murid::all();

        $payments = PembayaranMinggu::where('bulan', $this->bulanNama)
            ->where('tahun', $this->tahun)
            ->get();

        foreach ($payments as $p) {
            $this->pembayaranMap["{$p->murid_id}_{$p->minggu_ke}"] = [
                'id' => $p->id,
                'metode_pembayaran' => $p->metode_pembayaran,
                'keterangan' => $p->keterangan,
                'status' => $p->status,
            ];
        }
    }

    public function selectWeek($muridId, $mingguKe)
    {
        $murid = Murid::find($muridId);
        if (!$murid) return;

        $this->selectedMuridId = $muridId;
        $this->selectedMuridName = $murid->nama_lengkap;
        $this->selectedWeek = $mingguKe;

        $key = "{$muridId}_{$mingguKe}";
        $existing = $this->pembayaranMap[$key] ?? null;

        if ($existing) {
            $this->formType = 'edit';
            $this->existingPaymentId = $existing['id'];
            $this->metode = $existing['metode_pembayaran'] ?? '';
            $this->keterangan = $existing['keterangan'] ?? '';
            $this->jumlah_denda = '';
            $this->originalMetode = $this->metode;
            $this->originalKeterangan = $this->keterangan;
        } else {
            $this->formType = 'isi';
            $this->existingPaymentId = null;
            $this->reset(['metode', 'keterangan', 'jumlah_denda']);
            $this->originalMetode = '';
            $this->originalKeterangan = '';
        }
    }

    public function selectDenda($muridId)
    {
        $murid = Murid::find($muridId);
        if (!$murid) return;

        $this->selectedMuridId = $muridId;
        $this->selectedMuridName = $murid->nama_lengkap;
        $this->selectedWeek = null;
        $this->formType = 'denda';
        $this->existingPaymentId = null;
        $this->reset(['metode', 'keterangan', 'jumlah_denda']);
    }

    public function setMetode($metode)
    {
        $this->metode = $metode;
    }

    public function save()
    {
        $this->validate([
            'metode' => 'required|in:tunai,qris',
            'selectedMuridId' => 'required',
            'selectedWeek' => 'required|integer|between:1,4',
        ]);

        $user = $this->getCurrentUser();

        $payment = PembayaranMinggu::create([
            'murid_id' => $this->selectedMuridId,
            'minggu_ke' => $this->selectedWeek,
            'bulan' => $this->bulanNama,
            'tahun' => $this->tahun,
            'status' => 'lunas',
            'metode_pembayaran' => $this->metode,
            'jumlah' => $this->jumlahPerMinggu,
            'keterangan' => $this->keterangan,
            'tanggal_bayar' => now(),
            'created_by_id' => $user['id'],
            'created_by_role' => $user['role'],
        ]);

        $this->updateTotalKas($this->jumlahPerMinggu);

        $murid = Murid::find($this->selectedMuridId);
        RiwayatTransaksi::create([
            'tipe' => 'pemasukan',
            'nama' => $murid ? $murid->nama_lengkap : 'Siswa',
            'jumlah' => $this->jumlahPerMinggu,
            'metode_pembayaran' => $this->metode,
            'tanggal_waktu' => now(),
            'keterangan' => $this->keterangan ?: 'Pembayaran Minggu ' . $this->selectedWeek,
            'created_by_id' => $user['id'],
            'created_by_role' => $user['role'],
        ]);

        $key = "{$this->selectedMuridId}_{$this->selectedWeek}";
        $this->pembayaranMap[$key] = [
            'id' => $payment->id,
            'metode_pembayaran' => $payment->metode_pembayaran,
            'keterangan' => $payment->keterangan,
            'status' => $payment->status,
        ];

        $this->existingPaymentId = $payment->id;
        $this->formType = 'edit';

        session()->flash('success', 'Pembayaran minggu ' . $this->selectedWeek . ' berhasil dicatat sebagai lunas.');
    }

    public function saveDenda()
    {
        $this->validate([
            'metode' => 'required|in:tunai,qris',
            'jumlah_denda' => 'required|numeric|min:1',
        ]);

        $user = $this->getCurrentUser();

        PembayaranMinggu::create([
            'murid_id' => $this->selectedMuridId,
            'minggu_ke' => 0,
            'bulan' => $this->bulanNama,
            'tahun' => $this->tahun,
            'status' => 'lunas',
            'metode_pembayaran' => $this->metode,
            'jumlah' => $this->jumlah_denda,
            'keterangan' => $this->keterangan,
            'tanggal_bayar' => now(),
            'created_by_id' => $user['id'],
            'created_by_role' => $user['role'],
        ]);

        $this->updateTotalKas($this->jumlah_denda);

        $murid = Murid::find($this->selectedMuridId);
        RiwayatTransaksi::create([
            'tipe' => 'pemasukan',
            'nama' => $murid ? $murid->nama_lengkap : 'Siswa',
            'jumlah' => $this->jumlah_denda,
            'metode_pembayaran' => $this->metode,
            'tanggal_waktu' => now(),
            'keterangan' => $this->keterangan ?: 'Denda',
            'created_by_id' => $user['id'],
            'created_by_role' => $user['role'],
        ]);

        $this->batal();
        session()->flash('success', 'Denda berhasil dicatat sebagai lunas.');
    }

    public function update()
    {
        $this->validate([
            'metode' => 'required|in:tunai,qris',
            'existingPaymentId' => 'required',
        ]);

        $payment = PembayaranMinggu::find($this->existingPaymentId);
        if ($payment) {
            $payment->update([
                'metode_pembayaran' => $this->metode,
                'keterangan' => $this->keterangan,
            ]);

            $week = $payment->minggu_ke;
            $key = "{$this->selectedMuridId}_{$week}";
            $this->pembayaranMap[$key] = [
                'id' => $payment->id,
                'metode_pembayaran' => $this->metode,
                'keterangan' => $this->keterangan,
                'status' => $payment->status,
            ];

            session()->flash('success', 'Pembayaran berhasil diperbarui.');
        }
    }

    public function batal()
    {
        $this->selectedMuridId = null;
        $this->selectedMuridName = '';
        $this->selectedWeek = null;
        $this->existingPaymentId = null;
        $this->formType = 'kosong';
        $this->reset(['metode', 'keterangan', 'jumlah_denda']);
    }

    private function updateTotalKas($jumlah)
    {
        $totalKas = TotalKas::first();
        if (!$totalKas) {
            $totalKas = TotalKas::create([
                'total_saldo' => 0,
                'last_updated' => now(),
            ]);
        }
        $totalKas->increment('total_saldo', $jumlah);
        $totalKas->update(['last_updated' => now()]);
    }

    private function getCurrentUser()
    {
        $guards = ['admin', 'bendahara', 'guru', 'murid'];
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return [
                    'id' => Auth::guard($guard)->id(),
                    'role' => $guard,
                ];
            }
        }
        abort(403, 'Tidak terautentikasi.');
    }
};
