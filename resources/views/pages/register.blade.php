@extends('layouts.auth')

@section('content')
<div class="card-body">
    <!-- Logo + Nama Sistem -->
    <a href="#" class="text-nowrap text-center d-block py-3 w-100">
        <div class="d-flex align-items-center justify-content-center w-100">
            <img src="{{ asset('template/assets/img/kaiadmin/favicon.ico') }}" alt="SIMARAT Logo" class="me-2"
                style="width: 40px; height: 40px;">
            <span class="fw-bold" style="font-size: 1.5rem; 
                         background: linear-gradient(90deg, #667eea, #764ba2);
                         -webkit-background-clip: text; 
                         -webkit-text-fill-color: transparent;">
                SIMARAT
            </span>
        </div>
    </a>

    <!-- Keterangan Sistem -->
    <p class="text-center text-muted px-3" style="font-size: 0.95rem; line-height: 1.5;">
        Aplikasi berbasis web yang membantu perangkat desa dalam
        <span class="fw-semibold text-dark">mengarsipkan</span>,
        <span class="fw-semibold text-dark">mencari</span>, dan
        <span class="fw-semibold text-dark">mengelola surat resmi</span>
        secara digital.
    </p>

    <!-- Form Login -->
    <form>
        <div class="mb-3">
            <label for="exampleInputtext1" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-4">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-4">
            <label for="confirmation" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        
        <a href="./index.html" class="btn w-100 py-2 fs-5 mb-4 rounded-2 text-white"
            style="background: linear-gradient(90deg, #667eea, #764ba2);">
            Sign Up
        </a>
        <div class="d-flex align-items-center justify-content-center">
            <p class=" mb-0 fw-semibold">Sudah punya akun?</p>
            <a class="text-primary fw-bold ms-2" href="{{ route('login') }}">Login</a>
        </div>
    </form>
</div>

@endsection