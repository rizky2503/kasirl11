<?php

namespace App\Livewire;

use App\Models\Produk as ModelProduk; // pastikan nama file Model: Produk.php (P besar)
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProdukImport;

class Produk extends Component
{
    use WithFileUploads;

    public $pilihanMenu = 'lihat';
    public $nama;
    public $kode;
    public $harga;
    public $stok;
    public $produkTerpilih;
    public $fileExcel;

    public function mount(){
        if (auth()->user()->peran != 'admin'){
            abort(403);
        }
    }
    // ===== Import Excel =====
    public function imporExcel()
    {
        $this->validate([
            'fileExcel' => 'required|file|mimes:xlsx,xls,csv'
        ]);

        Excel::import(new ProdukImport, $this->fileExcel->getRealPath());

        $this->reset(['fileExcel']);
        $this->pilihanMenu = 'lihat';
    }

    // ===== Tambah Produk =====
    public function simpan()
    {
        $this->validate([
            'nama'  => 'required',
            'kode'  => 'required|unique:produk,kode',
            'harga' => 'required|numeric',
            'stok'  => 'required|integer'
        ], [
            'nama.required'  => 'Nama Harus Diisi',
            'kode.required'  => 'Kode Harus Diisi',
            'kode.unique'    => 'Kode Telah Digunakan',
            'harga.required' => 'Harga Harus Diisi',
            'stok.required'  => 'Stok Harus Diisi',
        ]);

        $simpan = new ModelProduk();
        $simpan->nama  = $this->nama;
        $simpan->kode  = $this->kode;
        $simpan->stok  = $this->stok;
        $simpan->harga = $this->harga;
        $simpan->save();

        $this->reset(['nama', 'kode', 'stok', 'harga']);
        $this->pilihanMenu = 'lihat';
    }

    // ===== Edit Produk =====
    public function pilihEdit($id)
    {
        $this->produkTerpilih = ModelProduk::findOrFail($id);
        $this->nama  = $this->produkTerpilih->nama;
        $this->kode  = $this->produkTerpilih->kode;
        $this->harga = $this->produkTerpilih->harga;
        $this->stok  = $this->produkTerpilih->stok;
        $this->pilihanMenu = 'edit';
    }

    public function simpanEdit()
    {
        $this->validate([
            'nama'  => 'required',
            'kode'  => 'required|unique:produk,kode,' . $this->produkTerpilih->id,
            'harga' => 'required|numeric',
            'stok'  => 'required|integer'
        ]);

        $simpan = $this->produkTerpilih;
        $simpan->nama  = $this->nama;
        $simpan->kode  = $this->kode;
        $simpan->stok  = $this->stok; // tidak pakai bcrypt lagi
        $simpan->harga = $this->harga;
        $simpan->save();

        $this->reset(['nama', 'kode', 'stok', 'harga', 'produkTerpilih']);
        $this->pilihanMenu = 'lihat';
    }

    // ===== Hapus Produk =====
    public function pilihHapus($id)
    {
        $this->produkTerpilih = ModelProduk::findOrFail($id);
        $this->pilihanMenu = 'hapus';
    }

    public function hapus()
    {
        $this->produkTerpilih->delete();
        $this->reset(['produkTerpilih']);
        $this->pilihanMenu = 'lihat';
    }

    // ===== Utility =====
    public function batal()
    {
        $this->reset(['nama', 'kode', 'stok', 'harga', 'produkTerpilih', 'fileExcel']);
        $this->pilihanMenu = 'lihat';
    }

    public function pilihMenu($menu)
    {
        $this->pilihanMenu = $menu;
    }

    // ===== Render View =====
    public function render()
    {
        return view('livewire.produk', [
            'semuaProduk' => ModelProduk::all()
        ]);
    }
}
