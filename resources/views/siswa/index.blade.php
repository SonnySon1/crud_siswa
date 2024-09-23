@extends('siswa.layouts.master')

@section('content')
    <h1>List Halaman Siswa</h1>
    <a href="/tambah">Tambah Siswa</a>
    <table  class="table table-striped">    
        <tr>
            <td>#</td>  
            <td>Nama</td>
            <td>Nis</td>
            <td>Kelas</td>
            <td>Jurusan</td>
        </tr>
        @foreach ($siswas as $index => $siswa)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $siswa->nama }}</td>
                <td>{{ $siswa->nis }}</td>
                <td>{{ $siswa->kelas }}</td>
                <td>{{ $siswa->jurusan->nama_jurusan }}</td>
            </tr>
        @endforeach
        
    </table>
@endsection