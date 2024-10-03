<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(){
        $jurusans = Jurusan::all();
        return view('auth.register', compact('jurusans'));
    }

    public function storeRegister(Request $request){
        $request->validate([
            'name'       =>  'required|max:255',
            'nis'        =>  'required|max:8|unique:users,nis',           
            'kelas'      =>  'required',           
            'jurusan_id' =>  'required',           
            'password'   =>  'required|min:8',                  
        ],[
            'name.required'       => 'Nama harus diisi',
            'name.max'            => 'Nama maksimal 255 karakter',
            'nis.required'        => 'Nis harus diisi',
            'nis.max'             => 'Nis maksimal 8 karakter',
            'nis.unique'          => 'Nis sudah ada',
            'kelas.required'      => 'Kelas harus diisi',
            'jurusan_id.required' => 'Jurusan harus diisi',
            'password.required'   => 'Password harus diisi',
            'password.min'        => 'Password minimal 8 karakter',
        ]);
        
        // masukan data ke database crud_sekolah nama table siswa
        $storeDataSiswa = [
            'nama'       => $request->name,
            'nis'        => $request->nis,
            'kelas'      => $request->kelas,
            'jurusan_id' => $request->jurusan_id,
            'password'   => bcrypt($request->password)
        ];

        User::create($storeDataSiswa);
        return redirect('/login');
    }



    // login
    public function login() {
        return view('auth.login');
    }





    public function storeLogin(Request $request) {        
        $credentials = $request->validate([
            'nis' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt($credentials)) {
                return redirect('/');
        } else {
            return redirect('/login')->with('error', 'nis / password salah');
        }
    }


    public function logout(Request $request) {
        
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/login');
    }   

}
