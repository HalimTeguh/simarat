@extends('layouts.main')

@section('content')

<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Kelola Surat - Manajemen Persuratan</h3>
                <h6 class="op-7 mb-2">Halaman ini digunakan untuk mengarsipkan, mencari, dan mengelola surat secara
                    digital</h6>
            </div>
        </div>
        @livewire('letter-table')
    </div>
</div>
@endsection