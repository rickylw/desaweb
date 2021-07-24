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

Route::get('/login', [App\Http\Controllers\AuthController::class, 'tampilLogin'])->name('login.index');
Route::post('/proses-login', [App\Http\Controllers\AuthController::class, 'prosesLogin'])->name('login');
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::get('/register', [App\Http\Controllers\AuthController::class, 'tampilRegister'])->name('register');
Route::post('/register/simpan', [App\Http\Controllers\AuthController::class, 'simpanRegister'])->name('register.simpan');

Route::get('/', [App\Http\Controllers\BeritaController::class, 'tampilBeranda'])->name('beranda');

Route::get('/berita/detail/{id}', [App\Http\Controllers\BeritaController::class, 'tampilDetailBerita'])->name('berita.detail');
Route::post('/berita/komentar/{id}', [App\Http\Controllers\BeritaController::class, 'simpanKomentar'])->name('berita.komentar');

Route::get('/profil/sejarah', [App\Http\Controllers\ProfilController::class, 'tampilSejarah'])->name('profil.sejarah');
Route::get('/profil/wilayah-geografis', [App\Http\Controllers\ProfilController::class, 'tampilWilayahGeografis'])->name('profil.wilayah-geografis');

Route::get('/organisasi/struktur-organisasi', [App\Http\Controllers\OrganisasiController::class, 'tampilStrukturOrganisasi'])->name('organisasi.struktur-organisasi');
Route::get('/organisasi/visi-misi', [App\Http\Controllers\OrganisasiController::class, 'tampilVisiMisi'])->name('organisasi.visi-misi');

Route::get('/potensi/kependudukan', [App\Http\Controllers\PotensiController::class, 'tampilKependudukan'])->name('potensi.kependudukan');
Route::get('/potensi/anggaran', [App\Http\Controllers\PotensiController::class, 'tampilAnggaran'])->name('potensi.anggaran');

Route::get('/potensi/produk-unggulan', [App\Http\Controllers\PotensiController::class, 'tampilProdukUnggulan'])->name('potensi.produk-unggulan');
Route::get('/potensi/produk-unggulan/{id}', [App\Http\Controllers\PotensiController::class, 'detailProdukUnggulan'])->name('potensi.produk-unggulan.detail');

Route::get('/informasi-lain', [App\Http\Controllers\BeritaController::class, 'tampilInformasiLain'])->name('informasi-lain');
Route::get('/galeri', [App\Http\Controllers\BeritaController::class, 'tampilGaleri'])->name('galeri');
Route::get('/galeri/detail', [App\Http\Controllers\BeritaController::class, 'tampilDetailGaleri'])->name('galeri.detail');