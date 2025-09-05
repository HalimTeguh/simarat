<div class="row" wire:key="category-table-container">
    <div class="col-md-12">
        <div class="card card-round">
            <div class="card-header">
                <div class="card-head-row card-tools-still-right">
                    <div class="card-title">
                        Kategori Surat
                        @if($search)
                        <small class="text-muted ms-2">- Pencarian: "{{ $search }}"</small>
                        @endif
                    </div>
                    <div class="card-tools">
                        <div class="input-icon">
                            <input type="text" name='search' class="form-control" placeholder="Search for..."
                                wire:model.live.debounce.300ms="search" value="{{ $search }}" />
                            <span class="input-icon-addon">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-start">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">slug</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody wire:key="categories-tbody">
                            {{-- Loading State --}}
                            <tr wire:loading wire:target="search, page">
                                <td colspan="6" class="text-center py-4">
                                    <div class="text-muted">
                                        <i class="fas fa-spinner fa-spin fa-2x mb-2 d-block"></i>
                                        Memuat data...
                                    </div>
                                </td>
                            </tr>
                            @forelse($categories as $index => $category)
                            <tr wire:loading.remove wire:key="category-{{ $category->id }}">
                                <td class="text-start">{{ $index + 1 }}</td>
                                <td class="text-center">
                                    <span class="fw-bold">{{ $category->name }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="text-muted">{{ $category->slug }}</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-icon btn-link btn-sm op-8 me-1"
                                            href="{{ route('categories.show', $category->id) }}" title="Lihat Detail">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                            class="d-inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-icon btn-delete btn-link btn-sm op-8"
                                                title="Hapus Kategory">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr wire:key="no-categories-found" wire:loading.remove>
                                <td colspan="6" class="text-center py-4">
                                    <div class="text-muted">
                                        @if($search)
                                        Tidak ada pengguna ditemukan untuk pencarian "<strong>{{ $search }}</strong>".
                                        @else
                                        Belum ada pengguna dalam sistem.
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Responsive Pagination Footer --}}
            <div class="d-flex flex-column flex-lg-row justify-content-lg-between align-items-center mx-4 my-3"
                wire:key="pagination-{{ $search }}">
                <div class="mb-2 mb-lg-0">
                    <span class="text-muted card-category">
                        @if($categories->total() > 0)
                        Menampilkan {{ $categories->firstItem() }} sampai {{ $categories->lastItem() }}
                        dari {{ $categories->total() }} Kategori
                        @if($search)
                        (hasil pencarian "{{ $search }}")
                        @endif
                        @else
                        @if($search)
                        Tidak ada hasil untuk pencarian "{{ $search }}"
                        @else
                        Tidak ada data ditemukan
                        @endif
                        @endif
                    </span>
                </div>
                <div class="d-flex justify-content-center justify-content-lg-end">
                    @if($categories->hasPages())
                    {{ $categories->withQueryString()->links('pagination::bootstrap-4') }}
                    @endif
                </div>
                <div></div>
            </div>
        </div>

        <div class="ms-md-auto py-2 py-md-0">
            <a href="{{ route('categories.create') }}" class="btn btn-primary btn-round">
                <i class="fas fa-plus"></i> Tambah Kategori
            </a>
        </div>
    </div>
</div>