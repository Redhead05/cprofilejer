@extends('admin.layout')

@section('title', 'Carousel')

@section('content')
    <div class="main-content-container overflow-hidden">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
            <div>
                <h3 class="mb-1">Carousel Banner</h3>
                <p class="text-secondary mb-0">Kelola slide carousel yang tampil di bagian banner landing page.</p>
            </div>

            <a href="{{ route('admin.carousel.create') }}" class="btn btn-primary py-2 px-4 rounded-3">
                <i class="ri-add-line me-1"></i>
                Tambah Carousel
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success border-0 rounded-3 mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="card bg-white border-0 rounded-3 mb-4">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Preview</th>
                                <th>Judul</th>
                                <th>Link</th>
                                <th>Urutan</th>
                                <th>Status</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($carousels as $carousel)
                                <tr>
                                    <td>
                                        @if ($carousel->image_url)
                                            <img src="{{ $carousel->image_url }}" alt="{{ $carousel->title }}" class="rounded-3" style="width: 100px; height: 64px; object-fit: cover;">
                                        @endif
                                    </td>
                                    <td>
                                        <div class="fw-medium">{{ $carousel->title }}</div>
                                        <div class="text-body">{{ \Illuminate\Support\Str::limit($carousel->description, 80) }}</div>
                                    </td>
                                    <td>
                                        @if ($carousel->link)
                                            <a href="{{ $carousel->link }}" target="_blank" rel="noreferrer noopener" class="text-primary">{{ \Illuminate\Support\Str::limit($carousel->link, 35) }}</a>
                                        @else
                                            <span class="text-secondary">-</span>
                                        @endif
                                    </td>
                                    <td>{{ $carousel->order }}</td>
                                    <td>
                                        <span class="badge {{ $carousel->is_active ? 'bg-primary bg-opacity-10 text-primary' : 'bg-danger bg-opacity-10 text-danger' }} p-2 fs-12 fw-normal">
                                            {{ $carousel->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-end align-items-center gap-2">
                                            <a href="{{ route('admin.carousel.edit', $carousel) }}" class="btn btn-outline-primary btn-sm rounded-3">Edit</a>
                                            <form method="POST" action="{{ route('admin.carousel.destroy', $carousel) }}" onsubmit="return confirm('Hapus slide carousel ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm rounded-3">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-secondary">Belum ada data carousel.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
