<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('beranda.index');
})->name('beranda');

Route::get('/berita/detail', [App\Http\Controllers\BeritaController::class, 'tampilDetail'])->name('berita.detail');

Route::get('/profil/sejarah', [App\Http\Controllers\ProfilController::class, 'tampilSejarah'])->name('profil.sejarah');
Route::get('/profil/wilayah-geografis', [App\Http\Controllers\ProfilController::class, 'tampilWilayahGeografis'])->name('profil.wilayah-geografis');

Route::get('/organisasi/struktur-organisasi', [App\Http\Controllers\OrganisasiController::class, 'tampilStrukturOrganisasi'])->name('organisasi.struktur-organisasi');
Route::get('/organisasi/visi-misi', [App\Http\Controllers\OrganisasiController::class, 'tampilVisiMisi'])->name('organisasi.visi-misi');

Route::get('/potensi/kependudukan', [App\Http\Controllers\PotensiController::class, 'tampilKependudukan'])->name('potensi.kependudukan');
Route::get('/potensi/anggaran', [App\Http\Controllers\PotensiController::class, 'tampilAnggaran'])->name('potensi.anggaran');

Route::get('/potensi/produk-unggulan', [App\Http\Controllers\BeritaController::class, 'tampilProdukUnggulan'])->name('potensi.produk-unggulan');
Route::get('/informasi-lain', [App\Http\Controllers\BeritaController::class, 'tampilInformasiLain'])->name('informasi-lain');
Route::get('/galeri', [App\Http\Controllers\BeritaController::class, 'tampilGaleri'])->name('galeri');
Route::get('/galeri/detail', [App\Http\Controllers\BeritaController::class, 'tampilDetailGaleri'])->name('galeri.detail');