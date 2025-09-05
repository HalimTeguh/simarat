@extends('layouts.main')

@section('content')

<div class="container">
  <div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
      <div>
        <h3 class="fw-bold mb-3">Detail Kategori - Manajemen Persuratan</h3>
        <h6 class="op-7 mb-2">Halaman ini digunakan untuk menampilkan data kategori</h6>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-head-row card-tools-still-right">
              <h4 class="card-title">Detail Kategori</h4>
              <div class="card-tools">
                <a class="btn btn-primary btn-md" href="{{ route('categories.edit', $category->id) }}">
                  <span class="fa fa-edit me-2"></span> edit
                </a>
                <a href="{{ route('categories.index') }}" class="btn btn-danger">Kembali</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-6">
                <div class="mb-3 ms-2">
                  <p class="card-category">
                    Nama Kategori
                  </p>
                  <h6>{{ $category->name }}</h6>
                </div>
                <div class="mb-3 ms-2">
                  <p class="card-category">
                    Slug
                  </p>
                  <h6>{{ $category->slug }}</h6>
                </div>
              </div>
              <div class="col-md-12 col-lg-6">
                <div class="mb-3 ms-2">
                  <p class="card-category">
                    Catatan
                  </p>
                  <h6>{{ $category->description ?? '-' }}</h6>
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