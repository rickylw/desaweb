<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\KategoriBerita;
use App\Models\Komentar;
use App\Models\Like;
use Illuminate\Support\Facades\DB;

class BeritaController extends Controller

//SELECT tbl_berita.*, komentar.jumlah_komentar, tbl_like.jumlah_like FROM tbl_berita left join (select *, count(id) as jumlah_like from tbl_like where status = 1 group by id_berita) tbl_like on tbl_berita.id = tbl_like.id_berita left join (select *, count(id) as jumlah_komentar from tbl_komentar group by id_berita) komentar on tbl_berita.id = komentar.id_berita group by tbl_berita.id
{
    public function tampilBeranda(){
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

        //Berita Terbaru
        $beritaTerbaru = clone $berita;
        $beritaTerbaru = $beritaTerbaru->paginate(6);

        //Berita Populer
        $beritaPopuler = clone $berita;
        $beritaPopuler = $beritaPopuler->orderBy('jumlah_like', 'desc')->limit(3)->get();

        //Berita Utama
        $beritaUtama = clone $berita;
        $beritaUtama = $beritaUtama->limit(3)->get();

        return view('beranda.index', ['beritaTerbaru' => $beritaTerbaru, 'beritaInformasiLainnya' => $beritaInformasiLainnya, 'beritaPopuler' => $beritaPopuler, 'beritaUtama' => $beritaUtama]);
    }

    public function tampilDetailBerita($id){
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

        
        //Detail Berita
        $beritaDetail = clone $berita;
        $beritaDetail = $beritaDetail->where('tbl_berita.id', $id)->first();

        //Komentar
        $komentar = DB::table('tbl_komentar')
                        ->join('tbl_masyarakat', 'tbl_masyarakat.id', '=', 'tbl_komentar.id_masyarakat')
                        ->select(DB::raw('tbl_komentar.*, tbl_masyarakat.nama as nama_masyarakat'))
                        ->where('id_berita', $id)
                        ->get();
        
        return view('beranda.detail-berita', ['beritaDetail' => $beritaDetail, 'beritaInformasiLainnya' => $beritaInformasiLainnya, 'beritaPopuler' => $beritaPopuler, 'komentar' => $komentar]);
    }

    public function simpanKomentar($id){
        $inputs = request()->validate([
            'komentar' => 'required'
        ]);

        $komentar = new Komentar();
        $komentar->id_berita = $id;
        $komentar->id_masyarakat = session('id');
        $komentar->tanggal = date("Y-m-d H:i:s");
        $komentar->komentar = $inputs['komentar'];
        $komentar->save();

        return redirect()->route('berita.detail', $id);
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
