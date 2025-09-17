<?php

namespace App\Imports;

use App\Models\Produk as ModelProduk;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ProdukImport implements ToCollection, WithStartRow
{
    // Mulai baca dari baris ke-2 (lewati header)
    public function startRow(): int
    {
        return 2;
    }

    public function collection(Collection $collection)
    {
        foreach ($collection as $col) {
            // cek apakah kode sudah ada di database
            $produkAda = ModelProduk::where('kode', $col[0])->first();

            if (!$produkAda) {
                $simpan = new ModelProduk();
                $simpan->kode  = $col[0]; // kolom A (kode/barcode)
                $simpan->nama  = $col[1]; // kolom B (nama produk)
                $simpan->harga = $col[2]; // kolom C (harga)
                $simpan->stok  = $col[3]; // kolom D (stok)
                $simpan->save();
            }
        }
    }
}
