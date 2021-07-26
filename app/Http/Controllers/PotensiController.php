<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kependudukan;
use App\Models\Pendidikan;
use App\Models\KategoriAnggaran;
use App\Models\KategoriBelanjaDesa;
use App\Models\Anggaran;
use App\Models\DetailAnggaran;
use App\Models\DetailBelanjaDesa;
use App\Models\ProdukUnggulan;
use App\Models\Website;

class PotensiController extends Controller
{
    public function tampilKependudukan(){
        $kependudukan = Kependudukan::all()->first();
        $pendidikan = Pendidikan::all()->first();

        //Data Penduduk
        //Total Penduduk
        $totalPenduduk = $kependudukan->laki_15 + $kependudukan->perempuan_15 + $kependudukan->laki_25 + $kependudukan->perempuan_25 + $kependudukan->laki_35 + $kependudukan->perempuan_35 + $kependudukan->laki_45 + $kependudukan->perempuan_45 + $kependudukan->laki_55 + $kependudukan->perempuan_55 + $kependudukan->laki_65 + $kependudukan->perempuan_65 + $kependudukan->laki_atas + $kependudukan->perempuan_atas;
        
        $dataPendudukUsia = array();
        //Mencari persentase usia dibawah 15 tahun
        $usiaDibawah15Tahun = $kependudukan->laki_15 + $kependudukan->perempuan_15;
        $dataPendudukUsia["dibawah15tahun"] = round($usiaDibawah15Tahun * 100 / $totalPenduduk, 2);
        //Mencari persentase usia diatas 65 tahun
        $usiaDiatas65Tahun = $kependudukan->laki_atas + $kependudukan->perempuan_atas;
        $dataPendudukUsia["diatas65tahun"] = round($usiaDiatas65Tahun * 100 / $totalPenduduk, 2);
        //Mencari persentasi usia diantara 15-65 tahun
        $usiaDiantaraTahun = $totalPenduduk - $usiaDibawah15Tahun - $usiaDiatas65Tahun;
        $dataPendudukUsia["diantara"] = round($usiaDiantaraTahun * 100 / $totalPenduduk, 2);
        $dataPendudukUsia["totalPenduduk"] = $totalPenduduk;

        //Mencari total laki-laki
        $totalLakiLaki = $kependudukan->laki_15 + $kependudukan->laki_25 + $kependudukan->laki_35 + $kependudukan->laki_45 + $kependudukan->laki_55+ $kependudukan->laki_65+ $kependudukan->laki_atas;
        $dataPendudukUsia["totalLakiLaki"] = $totalLakiLaki;
        //Mencari total perempuan
        $totalPerempuan = $kependudukan->perempuan_15 + $kependudukan->perempuan_25 + $kependudukan->perempuan_35 + $kependudukan->perempuan_45 + $kependudukan->perempuan_55 + $kependudukan->perempuan_65 + $kependudukan->perempuan_atas;
        $dataPendudukUsia["totalPerempuan"] = $totalPerempuan;

        $totalProduktif = $kependudukan->usia_produktif;
        //Mencari persentase usia yang produktif
        $dataPendudukUsia["totalProduktif"] = round($totalProduktif * 100 / $totalPenduduk, 2);
        //Mencari persentase usia yang tidak produktif
        $totalTidakProduktif = $totalPenduduk - $kependudukan->usia_produktif;
        $dataPendudukUsia["totalTidakProduktif"] = round($totalTidakProduktif * 100 / $totalPenduduk, 2);

        $website = Website::all()->first();

        return view('potensi.kependudukan', ['kependudukan' => $kependudukan, 'dataPendudukUsia' => $dataPendudukUsia, 'pendidikan' => $pendidikan, 'website' => $website]);
    }

    public function tampilAnggaran(){
        $kategoriAnggaran = KategoriAnggaran::all();
        $kategoriBelanjaDesa = KategoriBelanjaDesa::all();
        $anggaran = Anggaran::all();
        $detailAnggaran = DetailAnggaran::all();
        $detailBelanjaDesa = DetailBelanjaDesa::all();

        $website = Website::all()->first();

        return view('potensi.anggaran', ['kategoriAnggaran' => $kategoriAnggaran, 'kategoriBelanjaDesa' => $kategoriBelanjaDesa, 'anggaran' => $anggaran, 'detailAnggaran' => $detailAnggaran, 'detailBelanjaDesa' => $detailBelanjaDesa, 'website' => $website]);
    }

    public function tampilProdukUnggulan(){
        $produkUnggulan = ProdukUnggulan::paginate(6);
        $website = Website::all()->first();

        return view('potensi.produk-unggulan', ['produkUnggulan' => $produkUnggulan, 'website' => $website]);
    }

    public function detailProdukUnggulan($id){
        //Mencari produk unggulan berdasarkan id
        $produkUnggulan = ProdukUnggulan::where('id', $id)->first();
        $website = Website::all()->first();

        return view('potensi.detail-produk-unggulan', ['produkUnggulan' => $produkUnggulan, 'website' => $website]);
    }
}
