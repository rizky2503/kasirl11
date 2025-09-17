<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Beranda;
use App\Livewire\User;
use App\Livewire\Laporan;
use App\Livewire\Produk;
use App\Livewire\Transaksi;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' =>false]);

Route::get('/home', Beranda::class)->middleware(['auth'])->name('Home');
Route::get('/user', User::class)->middleware(['auth'])->name('User');
Route::get('/Pengguna', User::class)->middleware(['auth'])->name('Pengguna');
Route::get('/laporan', Laporan::class)->middleware(['auth'])->name('Laporan');
Route::get('/produk', Produk::class)->middleware(['auth'])->name('Produk');
Route::get('/transaksi', Transaksi::class)->middleware(['auth'])->name('Transaksi');
Route::get('/cetak', ['App\Http\Controllers\HomeController', 'cetak']);




