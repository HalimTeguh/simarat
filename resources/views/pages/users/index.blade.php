@extends('layouts.main')

@section('content')

<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Kelola Pengguna - Manajemen Persuratan</h3>
                <h6 class="op-7 mb-2">Halaman ini digunakan untuk mengelola pengguna</h6>
            </div>
        </div>
        @livewire('user-table')
    </div>
</div>
@endsection