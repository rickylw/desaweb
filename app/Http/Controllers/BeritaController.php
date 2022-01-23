<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\KategoriBerita;
use App\Models\Komentar;
use App\Models\Like;
use App\Models\Website;
use Illuminate\Support\Facades\DB;

class BeritaController extends Controller

{
    public function tampilBeranda(){
        //Menggabungkan antara tabel berita, komentar dan like dan di grup berdasarkan id berita
        //Untuk mengetahui jumlah like dan komentar
        $berita = DB::table('tbl_berita')
                    ->leftJoin(DB::raw('(select *, count(id) as jumlah_like from tbl_like where status = 1 group by id_berita) tbl_like'), 'tbl_berita.id', '=', 'tbl_like.id_berita')
                    ->leftJoin(DB::raw('(select *, count(id) as jumlah_komentar from tbl_komentar group by id_berita) komentar'), 'tbl_berita.id', '=', 'komentar.id_berita')
                    ->select(DB::raw('tbl_berita.*, komentar.jumlah_komentar, tbl_like.jumlah_like'))
                    ->where('tbl_berita.is_actived', 1)
                    ->groupBy('tbl_berita.id');

        //Mencari berita dengan kategori informasi lain
        $kategoriInformasiLainnya = KategoriBerita::where('nama', 'Informasi lain')->first();
        $beritaInformasiLainnya = array();
        if($kategoriInformasiLainnya){
            $beritaInformasiLainnya = clone $berita;
            $beritaInformasiLainnya = $beritaInformasiLainnya->where('id_kategori_berita', $kategoriInformasiLainnya->id)->orderBy('dibuat')->limit(3)->get();
        }

        //Berita Terbaru
        $beritaTerbaru = clone $berita;
        $beritaTerbaru = $beritaTerbaru->orderBy('dibuat', 'desc')->paginate(6);

        //Berita Populer berdasarkan jumlah like
        $beritaPopuler = clone $berita;
        $beritaPopuler = $beritaPopuler->orderBy('jumlah_like', 'desc')->limit(3)->get();

        //Berita Utama
        $beritaUtama = clone $berita;
        $beritaUtama = $beritaUtama->orderBy('dibuat', 'desc')->limit(3)->get();

        $website = Website::all()->first();

        return view('beranda.index', ['beritaTerbaru' => $beritaTerbaru, 'beritaInformasiLainnya' => $beritaInformasiLainnya, 'beritaPopuler' => $beritaPopuler, 'beritaUtama' => $beritaUtama, 'website' => $website]);
    }

    public function tampilDetailBerita($id){
        //Menggabungkan antara tabel berita, komentar dan like dan di grup berdasarkan id berita
        //Untuk mengetahui jumlah like dan komentar
        $berita = DB::table('tbl_berita')
                    ->leftJoin(DB::raw('(select *, count(id) as jumlah_like from tbl_like where status = 1 group by id_berita) tbl_like'), 'tbl_berita.id', '=', 'tbl_like.id_berita')
                    ->leftJoin(DB::raw('(select *, count(id) as jumlah_komentar from tbl_komentar group by id_berita) komentar'), 'tbl_berita.id', '=', 'komentar.id_berita')
                    ->select(DB::raw('tbl_berita.*, komentar.jumlah_komentar, tbl_like.jumlah_like'))
                    ->where('tbl_berita.is_actived', 1)
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

        //Menggabungkan tabel komentar dan masyarakat
        //Untuk mengetahui komentar serta masyarakat
        $komentar = DB::table('tbl_komentar')
                        ->join('tbl_masyarakat', 'tbl_masyarakat.id', '=', 'tbl_komentar.id_masyarakat')
                        ->select(DB::raw('tbl_komentar.*, tbl_masyarakat.nama as nama_masyarakat'))
                        ->where('id_berita', $id)
                        ->get();

        //Like
        $like = Like::where('id_masyarakat', session('id'))
                        ->where('id_berita', $id)->first();

        $website = Website::all()->first();
        
        return view('beranda.detail-berita', ['beritaDetail' => $beritaDetail, 'beritaInformasiLainnya' => $beritaInformasiLainnya, 'beritaPopuler' => $beritaPopuler, 'komentar' => $komentar, 'like' => $like, 'website' => $website]);
    }

    public function simpanKomentar($id){
        $inputs = request()->validate([
            'komentar' => 'required'
        ]);

        //Mengambil waktu sekarang
        $now = DB::select('select now() as date')[0]->date;

        $komentar = new Komentar();
        $komentar->id_berita = $id;
        $komentar->id_masyarakat = session('id');
        $komentar->tanggal = $now;
        $komentar->komentar = $inputs['komentar'];
        $komentar->save();

        return redirect()->route('berita.detail', $id);
    }

    public function simpanLike($id){
        $inputs = request()->validate([
            'like' => 'required'
        ]);

        //Mengambil waktu sekarang
        $now = DB::select('select now() as date')[0]->date;

        //Status
        //1. 1 = Like
        //2. 0 = Dislike
        //3. -1 = Tidak ada like maupun dislike (hapus record)
        if($inputs['like'] != -1){
            $like = Like::where('id_masyarakat', session('id'))
                        ->where('id_berita', $id)->get();
            
            //Cek apakah pengguna pernah like
            if(count($like) == 0){
                //Buat record baru
                $likeBaru = new Like();
                $likeBaru->id_berita = $id;
                $likeBaru->id_masyarakat = session('id');
                $likeBaru->tanggal = $now;
                $likeBaru->status = $inputs["like"];
                $likeBaru->save();
            }
            else{
                //update record lama
                $likeBaru = Like::where('id_masyarakat', session('id'))
                            ->where('id_berita', $id)->first();
                $likeBaru->status = $inputs["like"];
                $likeBaru->save();
            }
        }   
        else{
            //hapus record
            $like = Like::where('id_masyarakat', session('id'))
                            ->where('id_berita', $id)->first()->delete();
        }     
        return redirect()->route('berita.detail', $id);
    }

    public function tampilInformasiLain(){
        //Menggabungkan antara tabel berita, komentar dan like dan di grup berdasarkan id berita
        //Untuk mengetahui jumlah like dan komentar
        $berita = DB::table('tbl_berita')
                    ->leftJoin(DB::raw('(select *, count(id) as jumlah_like from tbl_like where status = 1 group by id_berita) tbl_like'), 'tbl_berita.id', '=', 'tbl_like.id_berita')
                    ->leftJoin(DB::raw('(select *, count(id) as jumlah_komentar from tbl_komentar group by id_berita) komentar'), 'tbl_berita.id', '=', 'komentar.id_berita')
                    ->select(DB::raw('tbl_berita.*, komentar.jumlah_komentar, tbl_like.jumlah_like'))
                    ->where('tbl_berita.is_actived', 1)
                    ->groupBy('tbl_berita.id');

        //InformasiLainnya
        $kategoriInformasiLainnya = KategoriBerita::where('nama', 'Informasi lain')->first();
        $beritaInformasiLainnya = array();
        if($kategoriInformasiLainnya){
            $beritaInformasiLainnya = clone $berita;
            $beritaInformasiLainnya = $beritaInformasiLainnya->where('id_kategori_berita', $kategoriInformasiLainnya->id)->orderBy('dibuat')->paginate(6);
        }

        $website = Website::all()->first();

        return view('informasi-lain.index', ['beritaInformasiLainnya' => $beritaInformasiLainnya, 'website' => $website]);
    }

    public function cariBerita(){
        $kataKunci = request('kataKunci');

        //Menggabungkan antara tabel berita, komentar dan like dan di grup berdasarkan id berita dan ditambahkan where untuk mencari berita berdasarkan judul dan deskripsi
        //Untuk mendapatkan berita berdasarkan kata kunci
        $berita = DB::table('tbl_berita')
                    ->leftJoin(DB::raw('(select *, count(id) as jumlah_like from tbl_like where status = 1 group by id_berita) tbl_like'), 'tbl_berita.id', '=', 'tbl_like.id_berita')
                    ->leftJoin(DB::raw('(select *, count(id) as jumlah_komentar from tbl_komentar group by id_berita) komentar'), 'tbl_berita.id', '=', 'komentar.id_berita')
                    ->select(DB::raw('tbl_berita.*, komentar.jumlah_komentar, tbl_like.jumlah_like'))
                    ->groupBy('tbl_berita.id')
                    ->where('tbl_berita.is_actived', 1)
                    ->whereRaw('judul like "%'.$kataKunci.'%" or isi like "%'.$kataKunci.'%"')
                    ->paginate(6);

        $website = Website::all()->first();

        return view('beranda.cari', ['kataKunci' => $kataKunci, 'berita' => $berita, 'website' => $website]);
    }
}
