@extends('layouts.main')

@section('content')

<div class="container">
  <div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
      <div>
        <h3 class="fw-bold mb-3">Dashboard - Manajemen Persuratan</h3>
        <h6 class="op-7 mb-2">Aplikasi berbasis web yang membantu perangkat desa dalam mengarsipkan, mencari, dan mengelola surat resmi secara digital. </h6>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 col-md-4">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center icon-primary bubble-shadow-small">
                  <i class="fas fa-users"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Pengguna</p>
                  <h4 class="card-title">4</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center icon-info bubble-shadow-small">
                  <i class="fas fa-file"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Surat Baru</p>
                  <h4 class="card-title">5</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center icon-success bubble-shadow-small">
                  <i class="fas fa-copy"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Total Surat</p>
                  <h4 class="card-title">57</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-9">
        <div class="card card-round">
          <div class="card-header">
            <div class="card-head-row card-tools-still-right">
              <div class="card-title">Arsip Surat</div>
              <div class="card-tools">
                <div class="dropdown">
                  <button class="btn btn-icon btn-clean me-0" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-h"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center mb-0">
                <thead class="thead-light">
                  <tr>
                    <th scope="col-1">Nomor Surat</th>
                    <th scope="col">Judul Surat</th>
                    <th scope="col" class="text-end">Kategori</th>
                    <th scope="col" class="text-end">Waktu pengarsipan</th>
                    <th scope="col" class="text-end">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">
                      0231
                    </th>
                    <td>Undangan Wisudaa</td>
                    <td class="text-end">
                      <span class="badge badge-success">Undangan</span>
                    </td>
                    <td class="text-end">Mar 19, 2020, 2.45pm</td>
                    <td class="text-end">
                      <button class="btn btn-icon btn-link op-8 me-1">
                        <i class="fa fa-eye"></i>
                      </button>
                      <button class="btn btn-icon btn-link op-8 me-1">
                        <i class="fa fa-trash"></i>
                      </button>
                    </td>
                  </tr>

                  <tr>
                    <th scope="row">
                      0231
                    </th>
                    <td>Undangan Wisudaa</td>
                    <td class="text-end">
                      <span class="badge badge-success">Undangan</span>
                    </td>
                    <td class="text-end">Mar 19, 2020, 2.45pm</td>
                    <td class="text-end">
                      <button class="btn btn-icon btn-link op-8 me-1">
                        <i class="fa fa-eye"></i>
                      </button>
                      <button class="btn btn-icon btn-link op-8 me-1">
                        <i class="fa fa-trash"></i>
                      </button>
                    </td>
                  </tr>

                  <tr>
                    <th scope="row">
                      0231
                    </th>
                    <td>Undangan Wisudaa</td>
                    <td class="text-end">
                      <span class="badge badge-success">Undangan</span>
                    </td>
                    <td class="text-end">Mar 19, 2020, 2.45pm</td>
                    <td class="text-end">
                      <button class="btn btn-icon btn-link op-8 me-1">
                        <i class="fa fa-eye"></i>
                      </button>
                      <button class="btn btn-icon btn-link op-8 me-1">
                        <i class="fa fa-trash"></i>
                      </button>
                    </td>
                  </tr>

                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
          <a href="{{ route('letters.create') }}" class="btn btn-primary btn-round">Arsipkan Surat</a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card card-round">
          <div class="card-body">
            <div class="card-head-row card-tools-still-right">
              <div class="card-title">Users</div>
            </div>
            <div class="card-list py-4">
              <div class="item-list">
                <div class="avatar">
                  <img src="{{ asset('template/assets/img/jm_denis.jpg') }}" alt="..."
                    class="avatar-img rounded-circle" />
                </div>
                <div class="info-user ms-3">
                  <div class="username">Jimmy Denis</div>
                  <div class="status">Graphic Designer</div>
                </div>
                <button class="btn btn-icon btn-link op-8 me-1">
                  <i class="far fa-envelope"></i>
                </button>
              </div>
              <div class="item-list">
                <div class="avatar">
                  <span class="avatar-title rounded-circle border border-white">CF</span>
                </div>
                <div class="info-user ms-3">
                  <div class="username">Chandra Felix</div>
                  <div class="status">Sales Promotion</div>
                </div>
                <button class="btn btn-icon btn-link op-8 me-1">
                  <i class="far fa-envelope"></i>
                </button>
              </div>
              <div class="item-list">
                <div class="avatar">
                  <img src="{{ asset('template/assets/img/talha.jpg') }}" alt="..." class="avatar-img rounded-circle" />
                </div>
                <div class="info-user ms-3">
                  <div class="username">Talha</div>
                  <div class="status">Front End Designer</div>
                </div>
                <button class="btn btn-icon btn-link op-8 me-1">
                  <i class="far fa-envelope"></i>
                </button>
              </div>
              <div class="item-list">
                <div class="avatar">
                  <img src="{{ asset('template/assets/img/chadengle.jpg') }}" alt="..."
                    class="avatar-img rounded-circle" />
                </div>
                <div class="info-user ms-3">
                  <div class="username">Chad</div>
                  <div class="status">CEO Zeleaf</div>
                </div>
                <button class="btn btn-icon btn-link op-8 me-1">
                  <i class="far fa-envelope"></i>
                </button>
              </div>
            </div>

          </div>
        </div>

      </div>

    </div>
  </div>
</div>
@endsection