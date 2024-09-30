@extends('siswa.layouts.master')
@section('content')
    <h1>Edit Data Siswa</h1>
    <a href="/" class="btn btn-danger mb-5">Kembali</a>
    <div class="card">
        <div class="card-body">
            <form action="/update/{{ $dataSiswa->id }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="">Nama</label>
                    <input name="name" value="{{ $dataSiswa->nama }}" type="text" class="form-control" placeholder="Nama" aria-label="Username" aria-describedby="basic-addon1">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>          
                <div class="mb-3">
                    <label for="">Nis</label>
                    <input name="nis" value="{{ $dataSiswa->nis }}"  type="text" class="form-control" placeholder="Nis" aria-label="Username" aria-describedby="basic-addon1">
                    @error('nis')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>          
                <div class="mb-3">
                    <label for="">Kelas</label>
                    <input name="kelas" value="{{ $dataSiswa->kelas }}"  type="text" class="form-control" placeholder="Kelas" aria-label="Username" aria-describedby="basic-addon1">
                    @error('kelas')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>          
                <div class="mb-3">
                    <label for="">Jurusan</label>
                    <select name="jurusan_id" class="form-select" aria-label="Default select example">
                        <option value="" selected>--Pilih Jurusan--</option>
                        @foreach ($jurusans as $jurusan)
                            <option {{ $dataSiswa->jurusan_id == $jurusan->id ? 'selected' : '' }} value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }}</option>
                        @endforeach
                      </select>
                      @error('jurusan_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                </div>          
                <div class="mb-3 d-block">
                    <label for="">Password</label>
                    <input  name="password" value="{{ $dataSiswa->password }}"  type="text" class="form-control " placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>      
                <div class="mb-3">
                    <label for="">Foto</label>
                    <input  name="foto"   type="file" class="form-control">
                    @error('foto')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <img width="100" class="mt-3 rounded-1" src="{{ asset('images/'.$dataSiswa->foto) }}" alt="">
                </div>    
                <div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
@endsection