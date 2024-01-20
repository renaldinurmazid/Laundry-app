<?php

use App\Http\Controllers\UserC;
use App\Http\Controllers\ProdukC;
use App\Http\Controllers\KategoriC;
use App\Http\Controllers\TransaksiC;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SPPTController;

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

Route::controller(AuthController::class)->group(function () {
    Route::get('login','login')->name('login');
    Route::post('login','loginAksi')->name('login.aksi');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});


Route::middleware('auth')->group(function(){
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');


Route::prefix('users')->controller(UserC::class)->group(function(){
    Route::get('', 'index')->name('users');
    Route::get('tambah', 'tambah')->name('users.tambah');
    Route::post('tambah/simpan', 'simpan')->name('users.simpan');
    Route::get('edit/{id}', 'edit')->name('users.edit');
    Route::post('edit/{id}', 'update')->name('users.update');
    Route::get('hapus/{id}', 'hapus')->name('users.hapus');
});


Route::prefix('produk')->controller(ProdukC::class)->group(function(){
    Route::get('/', 'index')->name('produk');
    Route::get('tambah', 'tambah')->name('produk.tambah');
    Route::post('tambah/simpan', 'simpan')->name('produk.simpan');
    Route::get('edit/{id}', 'edit')->name('produk.edit');
    Route::post('edit/{id}', 'update')->name('produk.update');
    Route::get('hapus/{id}', 'hapus')->name('produk.hapus');
});

Route::prefix('transaksi')->controller(TransaksiC::class)->group(function(){
    Route::get('/', 'index')->name('transaksi');
    Route::get('tambah', 'tambah')->name('transaksi.tambah');
    Route::post('tambah/simpan', 'simpan')->name('transaksi.simpan');
    Route::get('show/{id}', 'show')->name('transaksi.edit');
    Route::put('edit/{id}', 'update')->name('transaksi.update');
    Route::delete('hapus/{id}', 'destroy')->name('transaksi.destroy');
    Route::get('pdf', 'pdf')->name('transaksi.pdf');
    Route::get('pdf/{id}', 'byidpdf')->name('transaksi.byidpdf');
});

// // Contoh rute dalam file web.php
// Route::get('produk/update/{id}', [ProdukC::class, 'edit'])->name('produk.edit');
// Route::get('produk/update/{id}', [ProdukC::class, 'update'])->name('produk.update');

});

