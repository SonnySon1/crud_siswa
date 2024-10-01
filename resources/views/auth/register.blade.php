@extends('siswa.layouts.master')
@section('content')
<div class="d-flex justify-content-center"> 
    <div class="card mt-5 w-lg-50">
        <div class="card-header">
            Register
        </div>
        <div class="card-body">
          <h5 class="card-title">Register</h5>
          <p class="card-text">Silahkan register untuk membuat akun anda.</p>
          <form action="/register/store" method="post">
            @csrf
                <div class="mb-3">
                    <label for="nama">Nama</label>
                    <input name="name" type="text" class="form-control" placeholder="masukan nama">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nis">NIS</label>
                    <input name="nis" type="number" class="form-control" placeholder="masukan nis">
                    @error('nis')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama">Kelas</label>
                    <input name="kelas" type="text" class="form-control" placeholder="masukan kelas">
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
                    <label for="nama">Password</label>
                    <input name="password" type="password" class="form-control" placeholder="masukan password">
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>   
          </form>
        </div>
    </div>
</div>
@endsection