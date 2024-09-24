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
