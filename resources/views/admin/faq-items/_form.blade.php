<div class="row g-4">
    <div class="col-lg-8">
        <div class="card bg-white border-0 rounded-3 h-100">
            <div class="card-body p-4">
                <div class="mb-3">
                    <label for="question" class="form-label fw-semibold">Pertanyaan</label>
                    <input
                        type="text"
                        id="question"
                        name="question"
                        class="form-control @error('question') is-invalid @enderror"
                        value="{{ old('question', $faqItem->question) }}"
                        placeholder="Masukkan pertanyaan FAQ"
                        required
                    >
                    @error('question')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-0">
                    <label for="answer" class="form-label fw-semibold">Jawaban</label>
                    <textarea
                        id="answer"
                        name="answer"
                        rows="8"
                        class="form-control @error('answer') is-invalid @enderror"
                        placeholder="Masukkan jawaban FAQ"
                        required
                    >{{ old('answer', $faqItem->answer) }}</textarea>
                    @error('answer')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card bg-white border-0 rounded-3">
            <div class="card-body p-4">
                <div class="mb-3">
                    <label for="sort_order" class="form-label fw-semibold">Urutan Tampil</label>
                    <input
                        type="number"
                        min="0"
                        id="sort_order"
                        name="sort_order"
                        class="form-control @error('sort_order') is-invalid @enderror"
                        value="{{ old('sort_order', $faqItem->sort_order ?? 0) }}"
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
                        {{ old('is_active', $faqItem->is_active ?? true) ? 'checked' : '' }}
                    >
                    <label class="form-check-label fw-semibold" for="is_active">Tampilkan di landing page</label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex flex-wrap gap-2 mt-4">
    <button type="submit" class="btn btn-primary px-4">{{ $submitLabel }}</button>
    <a href="{{ route('admin.faq-items.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
</div>

