<div class="row" wire:key="user-table-container">
    <div class="col-md-12">
        <div class="card card-round">
            <div class="card-header">
                <div class="card-head-row card-tools-still-right">
                    <div class="card-title">
                        Pengguna Sistem
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
                                <th>ID</th>
                                <th>Avatar</th>
                                <th>Nama</th>
                                <th class="text-end">Role</th>
                                <th class="text-end">Email</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody wire:key="users-tbody">
                            {{-- Loading State --}}
                            <tr wire:loading wire:target="search, page">
                                <td colspan="6" class="text-center py-4">
                                    <div class="text-muted">
                                        <i class="fas fa-spinner fa-spin fa-2x mb-2 d-block"></i>
                                        Memuat data...
                                    </div>
                                </td>
                            </tr>
                            @forelse($users as $user)
                            @php
                            $role = $user->role;
                            $role_badge = '';
                            if ($role == 'admin') $role_badge = 'badge badge-danger';
                            if ($role == 'staff') $role_badge = 'badge badge-info';
                            if ($role == 'viewer') $role_badge = 'badge badge-success';
                            @endphp
                            <tr wire:loading.remove wire:key="user-{{ $user->id }}">
                                <td>{{ $user->id }}</td>
                                <td>
                                    {{-- Avatar Display --}}
                                    @if($user->avatar)
                                    <img src="{{ Storage::url($user->avatar) }}" alt="{{ $user->name }}"
                                        class="img-avatar rounded-3 shadow-sm"
                                        style="width: 40px; height: 40px; object-fit: cover;">
                                    @else
                                    <div class="avatar-placeholder d-flex align-items-center justify-content-center rounded-2 shadow-sm"
                                        style="width: 40px; height: 40px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                        <i class="fas fa-user text-white" style="font-size: 16px; opacity: 0.8;"></i>
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <span class="fw-bold">{{ $user->name }}</span>
                                        <small class="text-muted">ID: {{ $user->id }}</small>
                                    </div>
                                </td>
                                <td class="text-end">
                                    <span class="{{ $role_badge }}">{{ ucfirst($role) }}</span>
                                </td>
                                <td class="text-end">
                                    <span class="text-muted">{{ $user->email }}</span>
                                </td>
                                <td class="text-end">
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-icon btn-link btn-sm op-8 me-1"
                                            href="{{ route('users.show', $user->id) }}" title="Lihat Detail">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                            class="d-inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-icon btn-delete btn-link btn-sm op-8"
                                                title="Hapus User">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr wire:key="no-users-found" wire:loading.remove>
                                <td colspan="6" class="text-center py-4">
                                    <div class="text-muted">
                                        <i class="fas fa-users fa-2x mb-2 d-block"></i>
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
                        @if($users->total() > 0)
                        Menampilkan {{ $users->firstItem() }} sampai {{ $users->lastItem() }}
                        dari {{ $users->total() }} pengguna
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
                    @if($users->hasPages())
                    {{ $users->withQueryString()->links('pagination::bootstrap-4') }}
                    @endif
                </div>
                <div></div>
            </div>
        </div>

        <div class="ms-md-auto py-2 py-md-0">
            <a href="{{ route('users.create') }}" class="btn btn-primary btn-round">
                <i class="fas fa-plus"></i> Tambah Pengguna
            </a>
        </div>
    </div>
</div>