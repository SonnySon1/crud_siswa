@extends('siswa.layouts.master')
@section('content')
    <h1>Tambah Data Siswa</h1>
    <a href="/">Kembali</a>
    <form action="/store" method="post">
        @csrf
        <div class="mb-3">
            <label for="">Nama</label>
            <input name="name" type="text" class="form-control" placeholder="Nama" aria-label="Username" aria-describedby="basic-addon1">
        </div>          
        <div class="mb-3">
            <label for="">Nis</label>
            <input name="nis" type="text" class="form-control" placeholder="Nis" aria-label="Username" aria-describedby="basic-addon1">
        </div>          
        <div class="mb-3">
            <label for="">Kelas</label>
            <input name="kelas" type="text" class="form-control" placeholder="Kelas" aria-label="Username" aria-describedby="basic-addon1">
        </div>          
        <div class="mb-3">
            <label for="">Jurusan</label>
            <select name="jurusan_id" class="form-select" aria-label="Default select example">
                <option selected>--Pilih Jurusan--</option>
                @foreach ($jurusans as $jurusan)
                    <option value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }}</option>
                @endforeach
              </select>
        </div>          
        <div class="mb-3">
            <label for="">Password</label>
            <input name="password" type="text" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
        </div>          
        <div>
            <button type="submit">Tambah</button>
        </div>
    </form>
@endsection