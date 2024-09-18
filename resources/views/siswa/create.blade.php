@extends('siswa.layouts.master')
@section('master')
    <h1>Tambah Data Siswa</h1>
    <a href="/">Kembali</a>
    <form action="" method="post">
        <div class="mb-3">
            <label for="">Nama</label>
            <input type="text" class="form-control" placeholder="Nama" aria-label="Username" aria-describedby="basic-addon1">
        </div>          
        <div class="mb-3">
            <label for="">Nis</label>
            <input type="text" class="form-control" placeholder="Nis" aria-label="Username" aria-describedby="basic-addon1">
        </div>          
        <div class="mb-3">
            <label for="">Kelas</label>
            <input type="text" class="form-control" placeholder="Kelas" aria-label="Username" aria-describedby="basic-addon1">
        </div>          
        <div class="mb-3">
            <label for="">Jurusan</label>
            <input type="text" class="form-control" placeholder="Jurusan" aria-label="Username" aria-describedby="basic-addon1">
        </div>          
        <div>
            <button>Tambah</button>
        </div>
    </form>
@endsection