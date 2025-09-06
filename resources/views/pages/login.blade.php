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
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name='email'
                aria-describedby="email " value="{{ old('email') }}">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password" class="form-label fw-semibold">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                name='password'>
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="form-check">
            </div>
            <a class="text-primary fw-bold" href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                title="Hubungi admin untuk reset password">
                Forgot Password?
            </a>
        </div>
        <button type="submit" class="btn w-100 py-2 fs-3 mb-4 rounded-2 text-white"
            style="background: linear-gradient(90deg, #667eea, #764ba2);">
            Sign In
        </button>
        <div class="d-flex align-items-center justify-content-center">
            <p class=" mb-0 fw-semibold">Belum punya akun?</p>
            <a class="text-primary fw-bold ms-2" href="{{ route('register') }}">Ayo buat akun dulu</a>
        </div>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
  });
</script>


@endsection