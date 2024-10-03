@extends('siswa.layouts.master')

@section('content')
    <h1>List Halaman Siswa</h1>
    <div class="mb-3">
        <a href="/tambah" class="btn btn-primary">Tambah Siswa</a>
        <a href="/logout" class="btn btn-danger">Logout</a>
    </div>
    <div class="card">
        <table  class="table table-striped">    
            <tr>
                <th>#</th>  
                <th>Foto</th>
                <th>Nama</th>
                <th>Nis</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Opsi</th>
            </tr>
            @foreach ($siswas as $index => $siswa)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td><img width="100" src="{{ asset('images/'.$siswa->foto) }}" alt=""></td>
                    <td>{{ $siswa->nama }}</td>
                    <td>{{ $siswa->nis }}</td>
                    <td>{{ $siswa->kelas }}</td>
                    <td>{{ $siswa->jurusan->nama_jurusan }}</td>
                    <td>
                        <a href="/edit/{{ $siswa->id }}" class="btn btn-warning text-white">Edit</a>
                        <a href="/destroy/{{ $siswa->id }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection