@extends('layouts.main')

@section('content')

@php
$role = $user->role;
$role_badge = '';
if ($role == 'admin') $role_badge = 'badge badge-danger';
if ($role == 'staff') $role_badge = 'badge badge-info';
if ($role == 'viewer') $role_badge = 'badge badge-success';
@endphp

<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Selamat Datang, {{ $user->name }}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row card-tools-still-right">
                            <h4 class="card-title">Detail Pengguna</h4>
                            <div class="card-tools">
                                <a class="btn btn-primary btn-md" href="{{ route('profile.show', $user->id) }}">
                                    <span class="fa fa-edit me-2"></span> edit
                                </a>
                                <a href="{{ route('dashboard') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-3 text-center">
                                <img id="avatar-preview"
                                    src="{{ isset($user) && $user->avatar ? Storage::url($user->avatar) : '' }}"
                                    alt="Avatar Preview"
                                    class="img-avatar rounded-3 shadow-sm {{ (!isset($user) || !$user->avatar) ? 'd-none' : '' }}"
                                    style="width: 300px; height: 300px; object-fit: cover; border: 3px solid #dee2e6;" />

                                {{-- Default Avatar Icon Container --}}
                                <div id="avatar-placeholder"
                                    class="avatar-placeholder d-flex align-items-center justify-content-center rounded-3 shadow-sm {{ (isset($user) && $user->avatar) ? 'd-none' : '' }}"
                                    style="width: 300px; height: 300px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: 3px solid #dee2e6;">
                                    <i class="fas fa-user text-white" style="font-size: 48px; opacity: 0.8;"></i>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-9">
                                <div class="mb-3 ms-2">
                                    <p class="card-category">
                                        Nama Pengguna
                                    </p>
                                    <h6>{{ $user->name }} <span class="{{ $role_badge }} ms-4">{{ $user->role }}</span>
                                    </h6>
                                </div>
                                <div class="mb-3 ms-2">
                                    <p class="card-category">
                                        Email
                                    </p>
                                    <h6>{{ $user->email }}</h6>
                                </div>
                                <div class="mb-3 ms-2">
                                    <p class="card-category">
                                        Terdaftar pada sistem sejak
                                    </p>
                                    <h6>{{ \Carbon\Carbon::parse($user->created_at)
                                        ->setTimezone('Asia/Jakarta')
                                        ->locale('id')
                                        ->translatedFormat('d F Y, H:i') }} WIB</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection