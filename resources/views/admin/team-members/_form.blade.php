<div class="row g-4">
    <div class="col-lg-8">
        <div class="card bg-white border-0 rounded-3 h-100">
            <div class="card-body p-4">
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nama</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $teamMember->name) }}"
                        placeholder="Contoh: Nadia Rahma"
                        required
                    >
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="position" class="form-label fw-semibold">Jabatan</label>
                    <input
                        type="text"
                        id="position"
                        name="position"
                        class="form-control @error('position') is-invalid @enderror"
                        value="{{ old('position', $teamMember->position) }}"
                        placeholder="Contoh: Senior Legal Associate"
                        required
                    >
                    @error('position')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-0">
                    <label for="bio" class="form-label fw-semibold">Bio Singkat</label>
                    <textarea
                        id="bio"
                        name="bio"
                        rows="6"
                        class="form-control @error('bio') is-invalid @enderror"
                        placeholder="Deskripsi singkat tentang anggota tim"
                    >{{ old('bio', $teamMember->bio) }}</textarea>
                    @error('bio')
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
                    <label for="photo_url" class="form-label fw-semibold">Foto</label>
                    <input
                        type="file"
                        id="photo_url"
                        name="photo_url"
                        accept="image/png,image/jpeg,image/jpg,image/gif,image/webp"
                        class="form-control @error('photo_url') is-invalid @enderror"
                    >
                    <small class="text-secondary d-block mt-2">Upload gambar maksimal 2MB. Pastikan <code>php artisan storage:link</code> sudah dijalankan di Lerd.</small>
                    @error('photo_url')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                @if ($teamMember->photo_url)
                    <div class="mb-3 text-center">
                        <img src="{{ $teamMember->photo_url }}" alt="Preview foto" class="img-fluid rounded-3" style="max-height: 220px; object-fit: cover; width: 100%;">
                    </div>
                @endif

                <div class="mb-3">
                    <label for="sort_order" class="form-label fw-semibold">Urutan Tampil</label>
                    <input
                        type="number"
                        min="0"
                        id="sort_order"
                        name="sort_order"
                        class="form-control @error('sort_order') is-invalid @enderror"
                        value="{{ old('sort_order', $teamMember->sort_order ?? 0) }}"
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
                        {{ old('is_active', $teamMember->is_active ?? true) ? 'checked' : '' }}
                    >
                    <label class="form-check-label fw-semibold" for="is_active">Tampilkan di landing page</label>
                </div>
            </div>
        </div>

        <div class="card bg-white border-0 rounded-3">
            <div class="card-body p-4">
                <div class="mb-3">
                    <label for="facebook_url" class="form-label fw-semibold">Facebook URL</label>
                    <input type="url" id="facebook_url" name="facebook_url" class="form-control @error('facebook_url') is-invalid @enderror" value="{{ old('facebook_url', $teamMember->facebook_url) }}" placeholder="https://facebook.com/...">
                    @error('facebook_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="twitter_url" class="form-label fw-semibold">X / Twitter URL</label>
                    <input type="url" id="twitter_url" name="twitter_url" class="form-control @error('twitter_url') is-invalid @enderror" value="{{ old('twitter_url', $teamMember->twitter_url) }}" placeholder="https://x.com/...">
                    @error('twitter_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-0">
                    <label for="whatsapp_url" class="form-label fw-semibold">WhatsApp URL</label>
                    <input type="url" id="whatsapp_url" name="whatsapp_url" class="form-control @error('whatsapp_url') is-invalid @enderror" value="{{ old('whatsapp_url', $teamMember->whatsapp_url) }}" placeholder="https://wa.me/...">
                    @error('whatsapp_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex flex-wrap gap-2 mt-4">
    <button type="submit" class="btn btn-primary px-4">{{ $submitLabel }}</button>
    <a href="{{ route('admin.team-members.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
</div>

