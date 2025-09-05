@extends('layouts.main')

@section('content')

<div class="container">
  <div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
      <div>
        <h3 class="fw-bold mb-3">Arsipkan Surat - Manajemen Persuratan</h3>
        <h6 class="op-7 mb-2">Halaman ini digunakan untuk mengarsipkan surat</h6>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Arsipkan Surat</div>
          </div>
          <form action="{{ isset($letter) ? route('letters.update', $letter->id) : route('letters.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method(isset($letter) ? 'PUT' : 'POST')
            <div class="card-body">
              <div class="row">
                {{-- Column 1 --}}
                <div class="col-md-12 col-lg-8">
                  <div class="form-group">
                    <label for="no-letter">Nomor Surat <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('no_letter') is-invalid @enderror" id="no-letter"
                      name="no_letter" placeholder="Nomor Surat"
                      value="{{ isset($letter) ? $letter->number_of_letters : old('no_letter') }}" />
                    @error('no_letter')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="category-letter">Kategori Surat <span class="text-danger">*</span></label>
                    <select class="form-control @error('category_letter_id') is-invalid @enderror" id="category-letter"
                      name="category_letter_id">
                      <option selected>Pilih Kategori</option>
                      @foreach($categories as $category)
                      <option value="{{ $category->id }}" {{ (isset($letter) && $letter->category_id ==
                        $category->id)||(old('category_letter_id') == $category->id) ? 'selected' : '' }}>{{
                        $category->name }}</option>
                      @endforeach
                    </select>
                    @error('category_letter_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="title">Judul <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                      placeholder="Judul Surat" value="{{ isset($letter) ? $letter->title : old('title') }}" />
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="file-letter">Import File {!! isset($letter) ? '' : '<span class="text-danger">*</span>' !!}</label>
                    <input type="file" class="form-control-file @error('file_letter') is-invalid @enderror"
                      id="file-letter" name="file_letter" {{ isset($letter) ? '' : 'required' }} />
                    <small id="file-help" class="form-text text-muted">Dokumen harus dalam bentuk PDF</small>
                    @error('file_letter')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if(isset($letter) && $letter->file_path)
                    <p class="mt-2">
                      File saat ini:
                      <a href="{{ Storage::url($letter->file_path) }}" target="_blank">Lihat PDF</a>
                    </p>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="note">Note</label>
                    <textarea class="form-control @error('note') is-invalid @enderror" id="note" rows="5"
                      name="note">{{ isset($letter) ? $letter->notes : old('note') }}</textarea>
                    @error('note')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12 col-lg-4">
                  <div class="alert alert-warning" role="alert">
                    Catatan:
                    <ul>
                      <li>Surat harus dalam bentuk PDF</li>
                      <li>Nomor dan Judul surat harus unik</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-action">
              <button type="submit" class="btn btn-success">Submit</button>
              <a href="{{ route('letters.index') }}" class="btn btn-danger">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection