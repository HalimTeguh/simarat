<div class="row" wire:key="letter-table-container">
    <div class="col-md-12">
        <div class="card card-round">
            <div class="card-header">
                <div class="card-head-row card-tools-still-right">
                    <div class="card-title">
                        Arsip Surat
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
                                <th>Nomor Surat</th>
                                <th>Judul Surat</th>
                                <th class="text-end">Kategori</th>
                                <th class="text-end">Waktu pengarsipan</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody wire:key="letters-tbody-{{ $search }}">
                            @forelse($letters as $letter)
                            @php
                            $selected_category = $categories->where('id', $letter->category_id)->first();
                            $category_badge = 'badge badge-light';
                            if ($selected_category) {
                            if ($selected_category->slug == 'undangan') $category_badge = 'badge badge-success';
                            elseif ($selected_category->slug == 'pengumuman') $category_badge = 'badge badge-warning';
                            elseif ($selected_category->slug == 'nota-dinas') $category_badge = 'badge badge-secondary';
                            elseif ($selected_category->slug == 'pemberitahuan') $category_badge = 'badge badge-info';
                            }
                            @endphp
                            <tr wire:key="letter-{{ $letter->id }}">
                                <td>{{ $letter->number_of_letters }}</td>
                                <td>{{ $letter->title }}</td>
                                <td class="text-end">
                                    <span class="{{ $category_badge }}">{{ $selected_category ? $selected_category->name
                                        : '-' }}</span>
                                </td>
                                <td class="text-end">
                                    {{
                                    \Carbon\Carbon::parse($letter->date)->setTimezone('Asia/Jakarta')->locale('id')->translatedFormat('d
                                    F Y, H:i') }} WIB
                                </td>
                                <td class="text-end">
                                    <a class="btn btn-icon btn-link op-8 me-1"
                                        href="{{ route('letters.show', $letter->id) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'staff')
                                    <form action="{{ route('letters.destroy', $letter->id ) }}" method="POST"
                                        class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-icon btn-delete btn-link op-8 me-1">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr wire:key="no-letters-found">
                                <td colspan="5" class="text-center">
                                    @if($search)
                                    Tidak ada surat ditemukan untuk pencarian "{{ $search }}".
                                    @else
                                    Tidak ada surat ditemukan.
                                    @endif
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="d-flex flex-column flex-lg-row justify-content-lg-between align-items-center mx-4 my-3"
                wire:key="pagination-{{ $search }}">
                <div class="mb-2 mb-lg-0">
                    <span class="text-muted card-category">
                        @if($letters->total() > 0)
                        Menampilkan {{ $letters->firstItem() }} sampai {{ $letters->lastItem() }}
                        dari {{ $letters->total() }} surat
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
                    @if($letters->hasPages())
                    {{ $letters->withQueryString()->links('pagination::bootstrap-4') }}
                    @endif
                </div>
                <div></div>
            </div>
        </div>

        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'staff')
        <div class="ms-md-auto py-2 py-md-0">
            <a href="{{ route('letters.create') }}" class="btn btn-primary btn-round">Arsipkan Surat</a>
        </div>
        @endif
    </div>
</div>