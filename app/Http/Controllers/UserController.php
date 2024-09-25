<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $siswas = User::all();
        return view('siswa.index', compact('siswas'));
    }

    public function create() {
        $jurusans = Jurusan::all();
        return view('siswa.create', compact('jurusans'));
    }


    public  function store(Request $request) {


        // validasi data
        $request->validate([
            'name'       =>  'required|max:255',
            'nis'        =>  'required|max:8|unique:users,nis',           
            'kelas'      =>  'required',           
            'jurusan_id' =>  'required',           
            'password'   =>  'required|min:8'           
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
        return redirect('/');
    }
}
