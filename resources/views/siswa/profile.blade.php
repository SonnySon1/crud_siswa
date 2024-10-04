@extends('siswa.layouts.master')
@section('content')
    <h1>Profile Saya</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Profile Saya</h5>
            <hr>
            <div>
               <img width="50" src="{{ asset('images/'.Auth::user()->foto) }}" alt="">
            </div>
            <hr>
            <div>
                <p>Nama : {{ Auth::user()->nama }}</p>
            </div>
            <hr>
            <div>
                <p>NIS : {{ Auth::user()->nis }}</p>
            </div>
            <hr>
            <div>
                <p>Kelas : {{ Auth::user()->kelas }}</p>
            </div>
            <hr>
            <div>
                <p>Jurusan : {{ Auth::user()->jurusan->nama_jurusan }}</p>
            </div>
            <hr>
            
        </div>
    </div>
@endsection