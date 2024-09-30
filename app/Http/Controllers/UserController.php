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
            'password'   =>  'required|min:8',           
            'foto'       =>  'required|image|mimes:jpeg,png,jpg'           
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
        
        // photo
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images'), $fileName);
        }
        
        // masukan data ke database crud_sekolah nama table siswa
        $storeDataSiswa = [
            'nama'       => $request->name,
            'nis'        => $request->nis,
            'kelas'      => $request->kelas,
            'jurusan_id' => $request->jurusan_id,
            'password'   => bcrypt($request->password),
            'foto'       => $fileName
        ];

        User::create($storeDataSiswa);
        return redirect('/');
    }



    public function destroy(User $user) {
            if ($user->foto && file_exists(public_path('images/' . $user->foto))) {
                unlink(public_path('images/' . $user->foto));
            }
            $user->delete();    
            return redirect('/');
    }


    public function edit($id) {
        $dataSiswa = User::find($id);
        $jurusans = Jurusan::all();
        return view('siswa.edit', compact('dataSiswa', 'jurusans'));
    }


    public function update(Request $request, $id) {

        // validasi data
        $request->validate([
            'name'       =>  'required|max:255',
            'nis'        =>  'required|max:8',           
            'kelas'      =>  'required',           
            'jurusan_id' =>  'required',           
            'password'   =>  'required|min:8',
            'foto'       =>  'image|mimes:jpeg,png,jpg'                      
        ],[
            'name.required'       => 'Nama harus diisi',
            'name.max'            => 'Nama maksimal 255 karakter',
            'nis.required'        => 'Nis harus diisi',
            'nis.max'             => 'Nis maksimal 8 karakter',
            'kelas.required'      => 'Kelas harus diisi',
            'jurusan_id.required' => 'Jurusan harus diisi',
            'password.required'   => 'Password harus diisi',
            'password.min'        => 'Password minimal 8 karakter',
        ]);
        
        $dataUser = User::find($id);

        if ($request->hasFile('foto')) {
            if ($dataUser->foto && file_exists(public_path('images/' . $dataUser->foto))) {
                unlink(public_path('images/' . $dataUser->foto));
            }

            $file = $request->file('foto');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fileName);
        } else {
            $fileName = $dataUser->foto;
        }

        // siapkan data yang akan di update dan dimasukan ke dalam database
        $updateDataSiswa = [
            'nama'       => $request->name,
            'nis'        => $request->nis,
            'kelas'      => $request->kelas,
            'jurusan_id' => $request->jurusan_id,
            'password'   => bcrypt($request->password),
            'foto'       => $fileName
        ];

        // cari data berdasarkan id yang di kirim dan lakukan update
        $dataUser = User::find($id)->update($updateDataSiswa);
        return redirect('/');
    }
}
