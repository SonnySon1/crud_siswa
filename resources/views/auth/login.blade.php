@extends('siswa.layouts.master')
@section('content')
<div class="d-flex justify-content-center"> 
    <div class="card mt-5 w-lg-50">
        
        <div class="card-header">
            Login
        </div>
        <div class="card-body">
          <h5 class="card-title">Login</h5>
          <p class="card-text">Silahkan login untuk masuk ke akun anda.</p>
          <form action="/login/store" method="post">
            @csrf
                <div class="mb-3">
                    <label for="nis">NIS</label>
                    <input name="nis" type="number" class="form-control" placeholder="masukan nis">
                    @error('nis')
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
                <div>
                    @if (session('error'))
                        <p class="text-danger">{{ session('error') }}</p>
                    @endif
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>   
          </form>
        </div>
    </div>
</div>
@endsection