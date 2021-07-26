<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Facades\DB;
use App\Models\Website;

class GaleriController extends Controller
{
    public function tampilGaleri(){
        //Menggabungkan antara tabel galeri dan kategori galeri lalu di grup berdasarkan id kategori
        $galeri = DB::table('tbl_galeri')
                        ->join('tbl_kategori_galeri', 'tbl_kategori_galeri.id', '=', 'tbl_galeri.id_kategori_galeri')
                        ->select(DB::raw('tbl_galeri.*, tbl_kategori_galeri.nama as nama_kategori'))
                        ->groupBy('tbl_kategori_galeri.id')
                        ->paginate(6);

        $website = Website::all()->first();
        return view('galeri.index', ['galeri' => $galeri, 'website' => $website]);
    }

    public function tampilDetailGaleri($id){
        //Menggabungkan antara tabel galeri dan kategori galeri lalu filter berdasarkan id kategori yang dicari
        $galeri = DB::table('tbl_galeri')
                        ->join('tbl_kategori_galeri', 'tbl_kategori_galeri.id', '=', 'tbl_galeri.id_kategori_galeri')
                        ->select(DB::raw('tbl_galeri.*, tbl_kategori_galeri.nama as nama_kategori'))
                        ->where('id_kategori_galeri', $id)
                        ->paginate(6);

        $website = Website::all()->first();
        return view('galeri.detail-galeri', ['galeri' => $galeri, 'website' => $website]);
    }
}
