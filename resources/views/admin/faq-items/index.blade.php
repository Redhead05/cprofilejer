@extends('admin.layout')

@section('title', 'Kelola FAQ')

@section('content')
    <div class="main-content-container overflow-hidden">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
            <div>
                <h3 class="mb-1">FAQ Items</h3>
                <p class="text-secondary mb-0">Kelola pertanyaan dan jawaban yang tampil di landing page.</p>
            </div>

            <a href="{{ route('admin.faq-items.create') }}" class="btn btn-primary py-2 px-4 rounded-3">
                <i class="ri-add-line me-1"></i>
                Tambah FAQ
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success border-0 rounded-3 mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="card bg-white border-0 rounded-3 mb-4">
            <div class="card-body p-4">
                <form method="GET" action="{{ route('admin.faq-items.index') }}" class="row g-3 align-items-end mb-4">
                    <div class="col-lg-6">
                        <label for="search" class="form-label fw-semibold">Cari FAQ</label>
                        <input type="text" id="search" name="search" value="{{ $search }}" class="form-control" placeholder="Cari pertanyaan...">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-outline-primary px-4">Cari</button>
                    </div>
                    @if ($search !== '')
                        <div class="col-auto">
                            <a href="{{ route('admin.faq-items.index') }}" class="btn btn-outline-secondary px-4">Reset</a>
                        </div>
                    @endif
                </form>

                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Pertanyaan</th>
                                <th>Jawaban</th>
                                <th>Urutan</th>
                                <th>Status</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($faqItems as $faqItem)
                                <tr>
                                    <td class="fw-medium">{{ $faqItem->question }}</td>
                                    <td class="text-body">{{ \Illuminate\Support\Str::limit($faqItem->answer, 100) }}</td>
                                    <td>{{ $faqItem->sort_order }}</td>
                                    <td>
                                        <span class="badge {{ $faqItem->is_active ? 'bg-primary bg-opacity-10 text-primary' : 'bg-danger bg-opacity-10 text-danger' }} p-2 fs-12 fw-normal">
                                            {{ $faqItem->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-end align-items-center gap-2">
                                            <a href="{{ route('admin.faq-items.edit', $faqItem) }}" class="btn btn-outline-primary btn-sm rounded-3">Edit</a>
                                            <form method="POST" action="{{ route('admin.faq-items.destroy', $faqItem) }}" onsubmit="return confirm('Hapus FAQ ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm rounded-3">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5 text-secondary">Belum ada data FAQ.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($faqItems->hasPages())
                    <div class="mt-4 d-flex justify-content-end">
                        {{ $faqItems->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

