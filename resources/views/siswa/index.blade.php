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
        <tr>
            <td>1</td>
            <td>Alex</td>
            <td>111 1222 222</td>
            <td>2A</td>
            <td>Software Engineering</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Michael</td>
            <td>111 1222 333</td>
            <td>3A</td>
            <td>Software Engineering</td>
        </tr>
    </table>
@endsection