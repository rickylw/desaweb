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
});

Route::get('/berita/detail', [App\Http\Controllers\BeritaController::class, 'tampilDetail'])->name('berita.detail');
Route::get('/profil/sejarah', [App\Http\Controllers\BeritaController::class, 'tampilSejarah'])->name('profil.sejarah');
Route::get('/profil/wilayah-geografis', [App\Http\Controllers\BeritaController::class, 'tampilWilayahGeografis'])->name('profil.wilayah-geografis');
Route::get('/organisasi/struktur-organisasi', [App\Http\Controllers\BeritaController::class, 'tampilStrukturOrganisasi'])->name('organisasi.struktur-organisasi');
Route::get('/organisasi/visi-misi', [App\Http\Controllers\BeritaController::class, 'tampilVisiMisi'])->name('organisasi.visi-misi');
Route::get('/potensi/kependudukan', [App\Http\Controllers\BeritaController::class, 'tampilKependudukan'])->name('potensi.kependudukan');
Route::get('/potensi/anggaran', [App\Http\Controllers\BeritaController::class, 'tampilAnggaran'])->name('potensi.anggaran');