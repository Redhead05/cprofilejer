<div class="row g-4">
    <div class="col-lg-8">
        <div class="card bg-white border-0 rounded-3 h-100">
            <div class="card-body p-4">
                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Judul</label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title', $keyFeature->title) }}"
                        placeholder="Contoh: Real-Time Data Monitoring"
                        required
                    >
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-0">
                    <label for="description" class="form-label fw-semibold">Deskripsi</label>
                    <textarea
                        id="description"
                        name="description"
                        rows="6"
                        class="form-control @error('description') is-invalid @enderror"
                        placeholder="Deskripsi singkat fitur"
                        required
                    >{{ old('description', $keyFeature->description) }}</textarea>
                    @error('description')
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
                    <label for="icon" class="form-label fw-semibold">Icon Class</label>
                    <input
                        type="text"
                        id="icon"
                        name="icon"
                        class="form-control @error('icon') is-invalid @enderror"
                        value="{{ old('icon', $keyFeature->icon) }}"
                        placeholder="ri-bar-chart-box-ai-line"
                        required
                    >
                    @error('icon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-secondary d-block mt-2">Gunakan class icon dari Remix Icon.</small>
                </div>

                <div class="mb-3">
                    <label for="sort_order" class="form-label fw-semibold">Urutan Tampil</label>
                    <input
                        type="number"
                        min="0"
                        id="sort_order"
                        name="sort_order"
                        class="form-control @error('sort_order') is-invalid @enderror"
                        value="{{ old('sort_order', $keyFeature->sort_order ?? 0) }}"
                    >
                    @error('sort_order')
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
                        {{ old('is_active', $keyFeature->is_active ?? true) ? 'checked' : '' }}
                    >
                    <label class="form-check-label fw-semibold" for="is_active">Tampilkan di landing page</label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex flex-wrap gap-2 mt-4">
    <button type="submit" class="btn btn-primary px-4">{{ $submitLabel }}</button>
    <a href="{{ route('admin.key-features.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
</div>

