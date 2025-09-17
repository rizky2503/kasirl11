<?php

namespace App\Livewire;

use App\Models\DetilTransaksi;
use App\Models\Transaksi as ModelsTransaksi;
use App\Models\Produk;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Transaksi extends Component
{
    public $kode, $total, $kembalian, $totalSemuaBelanja;
    public $bayar = 0;
    public $transaksiAktif;

    public function transaksiBaru()
    {
        $this->reset();
        $this->transaksiAktif = ModelsTransaksi::create([
            'kode'   => 'INV/' . date('YmdHis'),
            'total'  => 0,
            'status' => 'pending',
        ]);
    }
    public function hapusProduk($id)
    {
        $detil = DetilTransaksi::find($id);
        if($detil) {
            $produk = Produk::find($detil->produk_id);
            $produk->stok += $detil->jumlah;
            $produk->save();
        }
        $detil->delete();
    }
    public function transaksiSelesai()
    {
        $this->transaksiAktif->total = $this->totalSemuaBelanja;
        $this->transaksiAktif->status = 'selesai';
        $this->transaksiAktif->save();
        $this->reset();
    }
    public function batalTransaksi()
    {
        if ($this->transaksiAktif) {
            $detilTransaksi = DetilTransaksi::where('transaksi_id', $this->transaksiAktif->id)->get();
            foreach ($detilTransaksi as $detil) {
                $produk = Produk::find($detil->produk_id);
                $produk->stok += $detil->jumlah;
                $produk->save();
                $detil->delete();
            }
            $this->transaksiAktif->delete();
        }
        $this->reset();
    }

    public function updatedKode()
{
    if (!$this->transaksiAktif) {
        return;
    }

    $produk = Produk::where('kode', $this->kode)->first();

if ($produk && $produk->stok > 0) {
    $detil = DetilTransaksi::firstOrNew([
        'transaksi_id' => $this->transaksiAktif->id,
        'produk_id'    => $produk->id,
    ]);

    if (!$detil->exists) {
        $detil->transaksi_id = $this->transaksiAktif->id; // wajib isi
        $detil->produk_id    = $produk->id;               // wajib isi
        $detil->jumlah       = 0;                         // inisialisasi
    }

    $detil->jumlah += 1;
    $detil->save();
    $produk->stok -= 1;
    $produk->save();
    $this->reset('kode');
}
}
    public function updatedBayar()
    {
        if ($this->bayar > 0) {
        $this->kembalian = $this->bayar - $this->totalSemuaBelanja;
        }
    }
    public function render()
    {
        if ($this->transaksiAktif) {
            $semuaProduk = DetilTransaksi::where('transaksi_id', $this->transaksiAktif->id)->get();
            $this->totalSemuaBelanja = $semuaProduk->sum(function ($detil) {
                return $detil->produk->harga * $detil->jumlah;
            });
        } else {
            $semuaProduk = [];
        }

        return view('livewire.transaksi', [
            'semuaProduk' => $semuaProduk,
        ]);
    }
}
