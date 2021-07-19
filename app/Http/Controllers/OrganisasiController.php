<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organisasi;

class OrganisasiController extends Controller
{
    public function tampilStrukturOrganisasi(){
        $organisasi = Organisasi::all()->first();
        return view('organisasi.struktur-organisasi', ['organisasi' => $organisasi]);
    }

    public function tampilVisiMisi(){
        $organisasi = Organisasi::all()->first();
        return view('organisasi.visi-misi', ['organisasi' => $organisasi]);
    }
}
