@extends('layouts.main')

@section('content')

<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">About Developer - Manajemen Persuratan</h3>
                <h6 class="op-7 mb-2">Halaman ini digunakan untuk menampilkan Informasi mengenai pengembang</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row card-tools-still-right">
                            <h4 class="card-title">Detail Pengembang</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-3 text-center">
                                <div class="gradient-border mx-auto"
                                    style="width: 300px; height: 300px; border-radius: 12px; padding: 4px; background: linear-gradient(135deg, #667eea, #764ba2);">
                                    <img id="avatar-preview" src="{{ asset('storage/aboutUs.jpg') }}"
                                        alt="Avatar Preview" class="rounded-3 shadow-sm"
                                        style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px; background-color: #fff;" />
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-5">
                                <div class="mb-3 ms-2">
                                    <p class="card-category">
                                        Nama Pengguna
                                    </p>
                                    <h6>Halim Teguh Saputro</h6>
                                </div>
                                <div class="mb-3 ms-2">
                                    <p class="card-category">
                                        Email
                                    </p>
                                    <h6>halimteguhsaputro@gmail.com</h6>
                                </div>
                                <div class="mb-3 ms-2">
                                    <p class="card-category">
                                        NIM
                                    </p>
                                    <h6>2141762122</h6>
                                </div>
                                <div class="mb-3 ms-2">
                                    <p class="card-category">
                                        Tanggal pengerjaan
                                    </p>
                                    <h6>1 s/d 6 September 2025</h6>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <div class="mb-3 ms-2">
                                    <p class="card-category">
                                        Github
                                    </p>
                                    <h6>
                                        <a class="btn btn-outline-primary" href="https://github.com/HalimTeguh/simarat" target="_blank" rel="noopener noreferrer">SIMARAT - Sistem Informasi Manajemen Persuratan</a>
                                    </h6>
                                </div>

                                <div class="mb-3 ms-2">
                                    <p class="card-category">
                                        Documentation (notion)
                                    </p>
                                    <h6><a <a class="btn btn-outline-info" href="https://www.notion.so/Certification-BNSP-265dc01c6d4f80d3993af62801ff0b6a?source=copy_link" target="_blank" rel="noopener noreferrer">Dokumentasi SIMARAT</a></h6>
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