<div class="row">
                        {{ $category->name ?? '' }}

    {{-- Column 1 --}}
    <div class="col-md-12 col-lg-8">
        <div class="form-group">
            <label for="name">Name<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                placeholder="nama kategori..." wire:model.live="name"
                value="{{ isset($category) ? $category->name : old('name') }}" />
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                placeholder="Slug" wire:model="slug" readonly
                value="{{ isset($category) ? $category->slug : old('slug') }}" />
            @error('slug')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="5"
                name="description">{{ isset($category) ? $category->description : old('description') }}</textarea>
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-12 col-lg-4">
        <div class="alert alert-warning" role="alert">
            Catatan:
            <ul>
                <li>Slug akan terisi otomatis</li>
            </ul>
        </div>
    </div>
</div>