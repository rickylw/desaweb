<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organisasi;
use App\Models\Berita;
use Illuminate\Support\Facades\DB;
use App\Models\KategoriBerita;

class OrganisasiController extends Controller
{
    public function tampilStrukturOrganisasi(){
        $berita = DB::table('tbl_berita')
                    ->leftJoin(DB::raw('(select *, count(id) as jumlah_like from tbl_like where status = 1 group by id_berita) tbl_like'), 'tbl_berita.id', '=', 'tbl_like.id_berita')
                    ->leftJoin(DB::raw('(select *, count(id) as jumlah_komentar from tbl_komentar group by id_berita) komentar'), 'tbl_berita.id', '=', 'komentar.id_berita')
                    ->select(DB::raw('tbl_berita.*, komentar.jumlah_komentar, tbl_like.jumlah_like'))
                    ->groupBy('tbl_berita.id');

        //InformasiLainnya
        $kategoriInformasiLainnya = KategoriBerita::where('nama', 'Informasi lain')->first();
        $beritaInformasiLainnya = array();
        if($kategoriInformasiLainnya){
            $beritaInformasiLainnya = clone $berita;
            $beritaInformasiLainnya = $beritaInformasiLainnya->where('id_kategori_berita', $kategoriInformasiLainnya->id)->orderBy('dibuat')->limit(3)->get();
        }

        //Berita Populer
        $beritaPopuler = clone $berita;
        $beritaPopuler = $beritaPopuler->orderBy('jumlah_like', 'desc')->limit(3)->get();

        $organisasi = Organisasi::all()->first();
        return view('organisasi.struktur-organisasi', ['organisasi' => $organisasi, 'beritaInformasiLainnya' => $beritaInformasiLainnya, 'beritaPopuler' => $beritaPopuler]);
    }

    public function tampilVisiMisi(){
        $berita = DB::table('tbl_berita')
                    ->leftJoin(DB::raw('(select *, count(id) as jumlah_like from tbl_like where status = 1 group by id_berita) tbl_like'), 'tbl_berita.id', '=', 'tbl_like.id_berita')
                    ->leftJoin(DB::raw('(select *, count(id) as jumlah_komentar from tbl_komentar group by id_berita) komentar'), 'tbl_berita.id', '=', 'komentar.id_berita')
                    ->select(DB::raw('tbl_berita.*, komentar.jumlah_komentar, tbl_like.jumlah_like'))
                    ->groupBy('tbl_berita.id');

        //InformasiLainnya
        $kategoriInformasiLainnya = KategoriBerita::where('nama', 'Informasi lain')->first();
        $beritaInformasiLainnya = array();
        if($kategoriInformasiLainnya){
            $beritaInformasiLainnya = clone $berita;
            $beritaInformasiLainnya = $beritaInformasiLainnya->where('id_kategori_berita', $kategoriInformasiLainnya->id)->orderBy('dibuat')->limit(3)->get();
        }

        //Berita Populer
        $beritaPopuler = clone $berita;
        $beritaPopuler = $beritaPopuler->orderBy('jumlah_like', 'desc')->limit(3)->get();

        $organisasi = Organisasi::all()->first();
        return view('organisasi.visi-misi', ['organisasi' => $organisasi, 'beritaInformasiLainnya' => $beritaInformasiLainnya, 'beritaPopuler' => $beritaPopuler]);
    }
}
