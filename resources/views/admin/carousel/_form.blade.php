<div class="row g-4">
    <div class="col-lg-8">
        <div class="card bg-white border-0 rounded-3 h-100">
            <div class="card-body p-4">
                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Judul Banner</label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title', $carousel->title) }}"
                        placeholder="Masukkan judul banner"
                        required
                    >
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Deskripsi</label>
                    <textarea
                        id="description"
                        name="description"
                        rows="6"
                        class="form-control @error('description') is-invalid @enderror"
                        placeholder="Masukkan deskripsi banner"
                    >{{ old('description', $carousel->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-0">
                    <label for="link" class="form-label fw-semibold">Link Tujuan</label>
                    <input
                        type="text"
                        id="link"
                        name="link"
                        class="form-control @error('link') is-invalid @enderror"
                        value="{{ old('link', $carousel->link) }}"
                        placeholder="https://contoh.com"
                    >
                    @error('link')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card bg-white border-0 rounded-3 mb-4">
            <div class="card-body p-4">
                <div class="mb-3">
                    <label for="image" class="form-label fw-semibold">Gambar Banner</label>
                    <input
                        type="file"
                        id="image"
                        name="image"
                        accept="image/png,image/jpeg,image/jpg,image/gif"
                        class="form-control @error('image') is-invalid @enderror"
                    >
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-secondary d-block mt-2">Upload gambar maksimal 2MB. Pastikan <code>php artisan storage:link</code> sudah dijalankan di Lerd.</small>
                </div>

                @if ($carousel->image_url)
                    <div class="mb-3">
                        <label class="form-label fw-semibold d-block">Gambar Saat Ini</label>
                        <img src="{{ $carousel->image_url }}" alt="{{ $carousel->title }}" class="img-fluid rounded-3 w-100" style="max-height: 220px; object-fit: cover;">
                    </div>
                @endif

                <div class="mb-3">
                    <label for="order" class="form-label fw-semibold">Urutan Tampil</label>
                    <input
                        type="number"
                        min="0"
                        id="order"
                        name="order"
                        class="form-control @error('order') is-invalid @enderror"
                        value="{{ old('order', $carousel->order ?? 0) }}"
                    >
                    @error('order')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-check form-switch mb-0">
                    <input
                        class="form-check-input"
                        type="checkbox"
                        role="switch"
                        id="is_active"
                        name="is_active"
                        value="1"
                        {{ old('is_active', $carousel->is_active ?? true) ? 'checked' : '' }}
                    >
                    <label class="form-check-label fw-semibold" for="is_active">Tampilkan di landing page</label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex flex-wrap gap-2 mt-4">
    <button type="submit" class="btn btn-primary px-4">{{ $submitLabel }}</button>
    <a href="{{ route('admin.carousel.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
</div>

