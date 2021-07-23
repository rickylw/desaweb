<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Komentar;
use App\Models\Like;
use Illuminate\Support\Facades\DB;

class BeritaController extends Controller
{
    public function tampilBeranda(){
        $berita = Berita::orderBy('id', 'desc')->paginate(6);
        return view('beranda.index', ['berita' => $berita]);
    }

    public function tampilDetail(){
        return view('beranda.detail-berita');
    }

    public function tampilGaleri(){
        return view('galeri.index');
    }

    public function tampilDetailGaleri(){
        return view('galeri.detail-galeri');
    }

    public function tampilInformasiLain(){
        return view('informasi-lain.index');
    }
}
