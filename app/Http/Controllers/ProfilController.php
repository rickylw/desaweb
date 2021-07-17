<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;

class ProfilController extends Controller
{
    public function tampilSejarah(){
        $profil = Profil::all()->first();
        return view('profil.sejarah', ['profil' => $profil]);
    }

    public function tampilWilayahGeografis(){
        $profil = Profil::all()->first();
        return view('profil.wilayah-geografis', ['profil' => $profil]);
    }
}
