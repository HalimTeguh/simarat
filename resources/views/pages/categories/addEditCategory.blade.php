@extends('layouts.main')

@section('content')

<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">{{ isset($category) ? "Edit" : "Tambah" }} Kategori - Manajemen Persuratan</h3>
                <h6 class="op-7 mb-2">Halaman ini digunakan untuk {{ isset($category) ? "mengubah" : "menambahkan" }}
                    Kategori</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Form Kategori</div>
                    </div>
                    <form
                        action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @method(isset($category) ? 'PUT' : 'POST')
                        <div class="card-body">
                            @if(isset($category))
                            @livewire('category-form', ['category' => $category])
                            @else
                            @livewire('category-form')
                            @endif
                        </div>
                </div>
                <div class="card-action">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-danger">Cancel</a>
                </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection