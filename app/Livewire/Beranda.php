<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\DetilTransaksi;

class Beranda extends Component
{
    public function render()
    {
        $jumlahUser = User::count();
        $jumlahProduk = Produk::count();
        $jumlahTransaksi = Transaksi::count();
        $jumlahLaporan = DetilTransaksi::count();

        return view('livewire.beranda', [
            'jumlahUser' => $jumlahUser,
            'jumlahProduk' => $jumlahProduk,
            'jumlahTransaksi' => $jumlahTransaksi,
            'jumlahLaporan' => $jumlahLaporan,

        ]);
    }
}
