<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masyarakat;

class AuthController extends Controller
{
    public function tampilLogin(){
        return view('auth.login');
    }
    
    public function prosesLogin(){
        $inputs = request()->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $masyarakat = Masyarakat::where('username', $inputs['username'])->first();

        //Cek apakah akun ditemukan
        if($masyarakat){
            if(md5($inputs['password']) == $masyarakat->password){
                //Menyimpan data login ke session
                session(['login' => true, 'id' => $masyarakat->id]);
                return redirect()->route('beranda');
            }
        }
        return redirect()->route('login.index');
    }

    public function logout(Request $request){
        //Membersihkan session
        $request->session()->flush();
        return redirect()->route('login.index');
    }

    public function tampilRegister(){
        return view('auth.register');
    }
    
    public function simpanRegister(){
        $inputs = request()->validate([
            'username' => 'required',
            'password' => 'required',
            'passwordConfirmation' => 'required|same:password',
            'nik' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'email' => 'required'
        ]);

        $masyarakat = new Masyarakat();
        $masyarakat->username = $inputs['username'];
        $masyarakat->password = md5($inputs['password']);
        $masyarakat->nik = $inputs['nik'];
        $masyarakat->nama = $inputs['nama'];
        $masyarakat->alamat = $inputs['alamat'];
        $masyarakat->nohp = $inputs['nohp'];
        $masyarakat->email = $inputs['email'];
        
        $masyarakat->save();
        return redirect()->route('login.index');
    }
}
