<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $table = 'produk'; // pastikan sesuai dengan nama tabel di database

    protected $fillable = [
        'name',
        'kode',
        'harga',
        'stok',
    ];
}
