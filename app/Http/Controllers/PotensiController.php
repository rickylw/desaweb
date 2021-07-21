<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kependudukan;
use App\Models\Pendidikan;
use App\Models\KategoriAnggaran;
use App\Models\KategoriBelanjaDesa;
use App\Models\Anggaran;
use App\Models\DetailAnggaran;

class PotensiController extends Controller
{
    public function tampilKependudukan(){
        $kependudukan = Kependudukan::all()->first();
        $pendidikan = Pendidikan::all()->first();

        //Data Penduduk
        //Total Penduduk
        $totalPenduduk = $kependudukan->laki_15 + $kependudukan->perempuan_15 + $kependudukan->laki_25 + $kependudukan->perempuan_25 + $kependudukan->laki_35 + $kependudukan->perempuan_35 + $kependudukan->laki_45 + $kependudukan->perempuan_45 + $kependudukan->laki_55 + $kependudukan->perempuan_55 + $kependudukan->laki_65 + $kependudukan->perempuan_65 + $kependudukan->laki_atas + $kependudukan->perempuan_atas;
        $dataPendudukUsia = array();
        $usiaDibawah15Tahun = $kependudukan->laki_15 + $kependudukan->perempuan_15;
        $dataPendudukUsia["dibawah15tahun"] = round($usiaDibawah15Tahun * 100 / $totalPenduduk, 2);
        $usiaDiatas65Tahun = $kependudukan->laki_atas + $kependudukan->perempuan_atas;
        $dataPendudukUsia["diatas65tahun"] = round($usiaDiatas65Tahun * 100 / $totalPenduduk, 2);
        $usiaDiantaraTahun = $totalPenduduk - $usiaDibawah15Tahun - $usiaDiatas65Tahun;
        $dataPendudukUsia["diantara"] = round($usiaDiantaraTahun * 100 / $totalPenduduk, 2);
        $dataPendudukUsia["totalPenduduk"] = $totalPenduduk;

        $totalLakiLaki = $kependudukan->laki_15 + $kependudukan->laki_25 + $kependudukan->laki_35 + $kependudukan->laki_45 + $kependudukan->laki_55+ $kependudukan->laki_65+ $kependudukan->laki_atas;
        $dataPendudukUsia["totalLakiLaki"] = $totalLakiLaki;
        $totalPerempuan = $kependudukan->perempuan_15 + $kependudukan->perempuan_25 + $kependudukan->perempuan_35 + $kependudukan->perempuan_45 + $kependudukan->perempuan_55 + $kependudukan->perempuan_65 + $kependudukan->perempuan_atas;
        $dataPendudukUsia["totalPerempuan"] = $totalPerempuan;

        $totalProduktif = $kependudukan->usia_produktif;
        $dataPendudukUsia["totalProduktif"] = round($totalProduktif * 100 / $totalPenduduk, 2);
        $totalTidakProduktif = $totalPenduduk - $kependudukan->usia_produktif;
        $dataPendudukUsia["totalTidakProduktif"] = round($totalTidakProduktif * 100 / $totalPenduduk, 2);

        return view('potensi.kependudukan', ['kependudukan' => $kependudukan, 'dataPendudukUsia' => $dataPendudukUsia, 'pendidikan' => $pendidikan]);
    }

    public function tampilAnggaran(){
        $kategoriAnggaran = KategoriAnggaran::all();
        $kategoriBelanjaDesa = KategoriBelanjaDesa::all();
        $anggaran = Anggaran::all();
        $detailAnggaran = DetailAnggaran::all();
        return view('potensi.anggaran', ['kategoriAnggaran' => $kategoriAnggaran, 'kategoriBelanjaDesa' => $kategoriBelanjaDesa, 'anggaran' => $anggaran, 'detailAnggaran' => $detailAnggaran]);
    }
}
