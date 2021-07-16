<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function tampilDetail(){
        return view('beranda.detail-berita');
    }

    public function tampilSejarah(){
        return view('profil.sejarah');
    }

    public function tampilWilayahGeografis(){
        return view('profil.wilayah-geografis');
    }

    public function tampilStrukturOrganisasi(){
        return view('organisasi.struktur-organisasi');
    }

    public function tampilVisiMisi(){
        return view('organisasi.visi-misi');
    }

    public function tampilKependudukan(){
        return view('potensi.kependudukan');
    }

    public function tampilAnggaran(){
        return view('potensi.anggaran');
    }
}
