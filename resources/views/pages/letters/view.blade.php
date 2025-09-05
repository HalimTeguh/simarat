@extends('layouts.main')

@section('content')

@php
$category = $letter->category_id;
$selected_category = $categories->where('id', $category)->first();
$category_badge = '';
if ($selected_category->slug == 'undangan') {
$category_badge = 'badge badge-success';
} elseif ($selected_category->slug == 'pengumuman') {
$category_badge = 'badge badge-warning';
} elseif ($selected_category->slug == 'nota-dinas') {
$category_badge = 'badge-lg badge-secondary';
} elseif ($selected_category->slug == 'pemberitahuan') {
$category_badge = 'badge badge-info';
}
@endphp

<div class="container">
  <div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
      <div>
        <h3 class="fw-bold mb-3">Detail Surat - Manajemen Persuratan</h3>
        <h6 class="op-7 mb-2">Halaman ini digunakan untuk menampilkan surat</h6>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-head-row card-tools-still-right">
              <h4 class="card-title">Detail Surat</h4>
              <div class="card-tools">
                <a class="btn btn-primary btn-md" href="{{ route('letters.edit', $letter->id) }}">
                  <span class="fa fa-edit me-2"></span> edit
                </a>
                <a href="{{ route('letters.index') }}" class="btn btn-danger">Kembali</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-6">
                <div class="mb-3 ms-2">
                  <p class="card-category">
                    Nomor Surat
                  </p>
                  <h6>{{ $letter->number_of_letters }} <span class="{{ $category_badge }} ms-4">{{ $selected_category->name
                      }}</span></h6>
                </div>
                <div class="mb-3 ms-2">
                  <p class="card-category">
                    Judul
                  </p>
                  <h6>{{ $letter->title }}</h6>
                </div>
                <div class="mb-3 ms-2">
                  <p class="card-category">
                    Tanggal Arsip
                  </p>
                  <h6>{{ \Carbon\Carbon::parse($letter->date)
                    ->setTimezone('Asia/Jakarta')
                    ->locale('id')
                    ->translatedFormat('d F Y, H:i') }} WIB</h6>
                </div>
              </div>
              <div class="col-md-12 col-lg-6">
                <div class="mb-3 ms-2">
                  <p class="card-category">
                    Catatan
                  </p>
                  <h6>{{ $letter->notes ?? '-' }}</h6>
                </div>
              </div>
              <div class="col-md-12 col-lg-12 mt-3">
                <iframe src="{{ Storage::url($letter->file_path) }}" width="100%" height="1000px" style="border:none;">
                </iframe>
                <p>
                  Jika PDF tidak tampil,
                  <a href="{{ Storage::url($letter->file_path) }}" target="_blank">
                    klik di sini untuk membuka
                  </a>.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection