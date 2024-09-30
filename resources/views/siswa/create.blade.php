@extends('siswa.layouts.master')
@section('content')
    <h1>Tambah Data Siswa</h1>
    <a href="/">Kembali</a>
    <form action="/store" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="">Nama</label>
            <input name="name" value="{{ old('name') }}" type="text" class="form-control" placeholder="Nama" aria-label="Username" aria-describedby="basic-addon1">
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>          
        <div class="mb-3">
            <label for="">Nis</label>
            <input name="nis" value="{{ old('nis') }}"  type="text" class="form-control" placeholder="Nis" aria-label="Username" aria-describedby="basic-addon1">
            @error('nis')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>          
        <div class="mb-3">
            <label for="">Kelas</label>
            <input name="kelas" value="{{ old('kelas') }}"  type="text" class="form-control" placeholder="Kelas" aria-label="Username" aria-describedby="basic-addon1">
            @error('kelas')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>          
        <div class="mb-3">
            <label for="">Jurusan</label>
            <select name="jurusan_id" class="form-select" aria-label="Default select example">
                <option value="" selected>--Pilih Jurusan--</option>
                @foreach ($jurusans as $jurusan)
                    <option {{ old('jurusan_id') == $jurusan->id ? 'selected' : '' }} value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }}</option>
                @endforeach
              </select>
              @error('jurusan_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
        </div>          
        <div class="mb-3">
            <label for="">Password</label>
            <input  name="password" value="{{ old('password') }}"  type="text" class="form-control " placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
            @error('password')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>          
        <div class="mb-3">
            <label for="">Foto</label>
            <input  name="foto" type="file" class="form-control">
            @error('foto')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button type="submit">Tambah</button>
        </div>
    </form>
@endsection