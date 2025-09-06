@extends('layouts.main')

@section('content')

<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">{{ isset($user) ? "Edit" : "Tambah" }} Pengguna - Manajemen Persuratan</h3>
                <h6 class="op-7 mb-2">Halaman ini digunakan untuk {{ isset($user) ? "mengubah" : "menambahkan" }}
                    Pengguna</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Form Pengguna</div>
                    </div>
                    <form action="{{ route('profile.update', $user->id)}}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="card-body">
                            <div class="row">
                                {{-- Column 1 --}}
                                <div class="col-md-12 col-lg-8">
                                    <div class="form-group">
                                        <label for="name">Nama Lengkap <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" placeholder="Budi Example"
                                            value="{{ $user->name}}" />
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" placeholder="example@mail.com" readonly
                                            value="{{ $user->email }}" />
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Role <span class="text-danger">*</span></label>
                                        <select class="form-control @error('role') is-invalid @enderror" id="role"
                                            name="role">
                                            <option selected>Pilih Role</option>
                                            <option value="admin" {{ ($user->role == 'admin') ?
                                                'selected' : '' }}>Admin</option>
                                            <option value="staff" {{ ($user->role == 'staff') ?
                                                'selected' : '' }}>Staff</option>
                                            <option value="viewer" {{ ($user->role == 'viewer') ?
                                                'selected' : '' }}>Viewer</option>
                                        </select>
                                        @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <label for="password">Password <span
                                                        class="text-danger">*</span></label>
                                                <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    id="password" name="password" placeholder="Password"
                                                    value="{{ old('password') }}" />
                                                @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <label for="password_confirmation">Konfirmasi Password <span
                                                        class="text-danger">*</span></label>
                                                <input type="password"
                                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                                    id="password_confirmation" name="password_confirmation"
                                                    placeholder="Konfirmasi Password"
                                                    value="{{ old('password_confirmation') }}" />
                                                @error('password_confirmation')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="form-group">
                                        {{-- Avatar Preview --}}
                                        <div class="text-center mb-3">
                                            <div class="avatar-preview-container position-relative d-inline-block">
                                                {{-- Avatar Image (hidden by default if no avatar) --}}
                                                <img id="avatar-preview"
                                                    src="{{ $user->avatar ? Storage::url($user->avatar) : '' }}"
                                                    alt="Avatar Preview"
                                                    class="img-fluid img-avatar rounded-3 shadow-sm {{ (!isset($user) || !$user->avatar) ? 'd-none' : '' }}"
                                                    style="width: 150px; height: 150px; object-fit: cover; border: 3px solid #dee2e6;" />

                                                {{-- Default Avatar Icon Container --}}
                                                <div id="avatar-placeholder"
                                                    class="avatar-placeholder d-flex align-items-center justify-content-center rounded-3 shadow-sm {{ ($user->avatar) ? 'd-none' : '' }}"
                                                    style="width: 150px; height: 150px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: 3px solid #dee2e6;">
                                                    <i class="fas fa-user text-white"
                                                        style="font-size: 48px; opacity: 0.8;"></i>
                                                </div>

                                                {{-- Upload Overlay --}}
                                                <div class="avatar-upload-overlay position-absolute top-50 start-50 translate-middle opacity-0 hover-opacity-100 transition-opacity"
                                                    style="background: rgba(0,0,0,0.5); border-radius: 12px; width: 150px; height: 150px; display: flex; align-items: center; justify-content: center; cursor: pointer;"
                                                    onclick="document.getElementById('avatar').click()">
                                                    <i class="fas fa-camera text-white" style="font-size: 24px;"></i>
                                                </div>
                                            </div>

                                            <div class="mt-2 d-block">
                                                <label for="avatar">Avatar</label>
                                            </div>

                                            {{-- File Size Info --}}
                                            <small class="text-muted d-block mt-2">
                                                <i class="fas fa-info-circle"></i>
                                                Format: JPG, PNG | Max: 2MB | Ukuran ideal: 400x400px
                                            </small>
                                        </div>

                                        {{-- File Input --}}
                                        <div class="form-group">
                                            <input type="file"
                                                class="form-control @error('avatar') is-invalid @enderror" id="avatar"
                                                name="avatar" accept=".jpg,.jpeg,.png" onchange="previewAvatar(this)" />

                                            @error('avatar')
                                            <div class="invalid-feedback">
                                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                            </div>
                                            @enderror

                                            {{-- Upload Status --}}
                                            <div id="upload-status" class="mt-2" style="display: none;">
                                                <small class="text-success">
                                                    <i class="fas fa-check-circle"></i>
                                                    <span id="file-name"></span> siap diupload
                                                </small>
                                            </div>
                                        </div>

                                        {{-- Action Buttons --}}
                                        <div class="d-flex gap-2 justify-content-center">
                                            <button type="button" class="btn btn-outline-danger btn-sm"
                                                id="remove-avatar" onclick="removeAvatar()" style="display: none;">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card-action">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{ route('profile.index') }}" class="btn btn-danger">Cancel</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<style>
    .avatar-preview-container:hover .avatar-upload-overlay {
        opacity: 1 !important;
    }

    .transition-opacity {
        transition: opacity 0.3s ease;
    }

    .img-avatar,
    .avatar-placeholder {
        transition: all 0.3s ease;
    }

    .avatar-preview-container:hover .img-avatar,
    .avatar-preview-container:hover .avatar-placeholder {
        transform: scale(1.05);
    }

    .avatar-placeholder {
        position: relative;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    /* Alternative gradient options */
    .avatar-placeholder.style-1 {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .avatar-placeholder.style-2 {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }

    .avatar-placeholder.style-3 {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }

    .avatar-placeholder.style-4 {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
    }
</style>

<script>
    function previewAvatar(input) {
    const file = input.files[0];
    const preview = document.getElementById('avatar-preview');
    const placeholder = document.getElementById('avatar-placeholder');
    const status = document.getElementById('upload-status');
    const fileName = document.getElementById('file-name');
    const removeBtn = document.getElementById('remove-avatar');
    
    if (file) {
        // Validate file type
        const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
        if (!allowedTypes.includes(file.type)) {
            alert('Format file tidak didukung. Gunakan format JPG atau PNG.');
            input.value = '';
            return;
        }
        
        // Validate file size (2MB)
        const maxSize = 2 * 1024 * 1024; // 2MB in bytes
        if (file.size > maxSize) {
            alert('Ukuran file terlalu besar. Maksimal 2MB.');
            input.value = '';
            return;
        }
        
        // Create file reader
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            
            // Show image, hide placeholder
            preview.classList.remove('d-none');
            placeholder.classList.add('d-none');
            
            // Show upload status
            fileName.textContent = file.name;
            status.style.display = 'block';
            removeBtn.style.display = 'inline-block';
            
            // Add success border to preview
            preview.style.borderColor = '#28a745';
        };
        reader.readAsDataURL(file);
    }
}

function removeAvatar() {
    const input = document.getElementById('avatar');
    const preview = document.getElementById('avatar-preview');
    const placeholder = document.getElementById('avatar-placeholder');
    const status = document.getElementById('upload-status');
    const removeBtn = document.getElementById('remove-avatar');
    const hasExistingAvatar = '{{  $user->avatar ? "true" : "false" }}' === 'true';
    
    // Reset input
    input.value = '';
    status.style.display = 'none';
    removeBtn.style.display = 'none';
    
    if (hasExistingAvatar) {
        // If user had an existing avatar, show it
        preview.src = '{{$user->avatar ? Storage::url($user->avatar) : "" }}';
        preview.classList.remove('d-none');
        placeholder.classList.add('d-none');
    } else {
        // If no existing avatar, show placeholder
        preview.classList.add('d-none');
        placeholder.classList.remove('d-none');
    }
    
    // Reset border color
    preview.style.borderColor = '#dee2e6';
}

// Drag and drop functionality
const avatarContainer = document.querySelector('.avatar-preview-container');
const avatarInput = document.getElementById('avatar');

['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    avatarContainer.addEventListener(eventName, preventDefaults, false);
});

function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
}

['dragenter', 'dragover'].forEach(eventName => {
    avatarContainer.addEventListener(eventName, highlight, false);
});

['dragleave', 'drop'].forEach(eventName => {
    avatarContainer.addEventListener(eventName, unhighlight, false);
});

function highlight(e) {
    const activeElement = document.querySelector('#avatar-preview:not(.d-none), #avatar-placeholder:not(.d-none)');
    if (activeElement) {
        activeElement.style.borderColor = '#007bff';
        if (activeElement.id === 'avatar-placeholder') {
            activeElement.style.background = 'linear-gradient(135deg, #007bff 0%, #0056b3 100%)';
        }
    }
}

function unhighlight(e) {
    const activeElement = document.querySelector('#avatar-preview:not(.d-none), #avatar-placeholder:not(.d-none)');
    if (activeElement) {
        activeElement.style.borderColor = '#dee2e6';
        if (activeElement.id === 'avatar-placeholder') {
            activeElement.style.background = 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)';
        }
    }
}

avatarContainer.addEventListener('drop', handleDrop, false);

function handleDrop(e) {
    const dt = e.dataTransfer;
    const files = dt.files;
    
    if (files.length > 0) {
        avatarInput.files = files;
        previewAvatar(avatarInput);
    }
}
</script>
@endsection