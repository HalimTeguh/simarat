<div class="col-md-3">
    <div class="card card-round">
        <div class="card-body">
            <div class="card-head-row card-tools-still-right">
                <div class="card-title">
                    Pengguna
                </div>
            </div>
            <div class="card-list py-4">
                @foreach($users as $user)
                @php
                $role = $user->role;
                $role_badge = '';
                if ($role == 'admin') $role_badge = 'badge badge-danger';
                if ($role == 'staff') $role_badge = 'badge badge-info';
                if ($role == 'viewer') $role_badge = 'badge badge-success';
                @endphp
                <div class="item-list">
                    <div class="avatar">
                        {{-- Avatar Display --}}
                        @if($user->avatar)
                        <img src="{{ Storage::url($user->avatar) }}" alt="{{ $user->name }}"
                            class="avatar-img rounded-circle rounded-3 shadow-sm" style="object-fit: cover;">
                        @else
                        <div class="avatar-img rounded-circle d-flex align-items-center justify-content-center rounded-2 shadow-sm"
                            style=" background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                            <i class="fas fa-user text-white" style="font-size: 16px; opacity: 0.8;"></i>
                        </div>
                        @endif
                        {{-- <img src="{{ asset('template/assets/img/jm_denis.jpg') }}" alt="..."
                            class="avatar-img rounded-circle" /> --}}
                    </div>
                    <div class="info-user ms-3">
                        <div class="username">{{ $user->name }}</div>
                        <span class="{{ $role_badge }}">{{ ucfirst($role) }}</span>
                    </div>
                    <a href="mailto:{{ $user->email }}" class="btn btn-icon btn-link op-8 me-1">
                        <i class="far fa-envelope"></i>
                    </a>
                </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center">
                {{ $users->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>