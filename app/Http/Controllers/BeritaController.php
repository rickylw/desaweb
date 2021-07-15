<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function tampilDetail(){
        return view('beranda.detail-berita');
    }
}
