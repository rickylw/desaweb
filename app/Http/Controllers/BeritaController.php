<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function tampilDetail(){
        return view('beranda.detail-berita');
    }

    public function tampilGaleri(){
        return view('galeri.index');
    }

    public function tampilDetailGaleri(){
        return view('galeri.detail-galeri');
    }

    public function tampilProdukUnggulan(){
        return view('potensi.produk-unggulan');
    }

    public function tampilInformasiLain(){
        return view('informasi-lain.index');
    }
}
