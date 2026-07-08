@extends('admin.layout')

@section('title', 'Kelola Team Members')

@section('content')
    <div class="main-content-container overflow-hidden">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
            <div>
                <h3 class="mb-1">Team Members</h3>
                <p class="text-secondary mb-0">Kelola data anggota tim yang tampil di landing page.</p>
            </div>

            <a href="{{ route('admin.team-members.create') }}" class="btn btn-primary py-2 px-4 rounded-3">
                <i class="ri-add-line me-1"></i>
                Tambah Team Member
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success border-0 rounded-3 mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="card bg-white border-0 rounded-3 mb-4">
            <div class="card-body p-4">
                <form method="GET" action="{{ route('admin.team-members.index') }}" class="row g-3 align-items-end mb-4">
                    <div class="col-lg-6">
                        <label for="search" class="form-label fw-semibold">Cari anggota tim</label>
                        <input type="text" id="search" name="search" value="{{ $search }}" class="form-control" placeholder="Cari nama atau jabatan...">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-outline-primary px-4">Cari</button>
                    </div>
                    @if ($search !== '')
                        <div class="col-auto">
                            <a href="{{ route('admin.team-members.index') }}" class="btn btn-outline-secondary px-4">Reset</a>
                        </div>
                    @endif
                </form>

                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Urutan</th>
                                <th>Status</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($teamMembers as $teamMember)
                                <tr>
                                    <td>
                                        @if ($teamMember->photo_url)
                                            <img src="{{ $teamMember->photo_url }}" alt="{{ $teamMember->name }}" class="rounded-circle" style="width: 48px; height: 48px; object-fit: cover;">
                                        @else
                                            <div class="rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center fw-semibold" style="width: 48px; height: 48px;">
                                                {{ \Illuminate\Support\Str::of($teamMember->name)->explode(' ')->map(fn ($part) => \Illuminate\Support\Str::substr($part, 0, 1))->take(2)->implode('') }}
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <h6 class="mb-1 fs-14 fw-medium">{{ $teamMember->name }}</h6>
                                        <span class="text-body fs-13">{{ \Illuminate\Support\Str::limit($teamMember->bio, 60) }}</span>
                                    </td>
                                    <td>{{ $teamMember->position }}</td>
                                    <td>{{ $teamMember->sort_order }}</td>
                                    <td>
                                        <span class="badge {{ $teamMember->is_active ? 'bg-primary bg-opacity-10 text-primary' : 'bg-danger bg-opacity-10 text-danger' }} p-2 fs-12 fw-normal">
                                            {{ $teamMember->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-end align-items-center gap-2">
                                            <a href="{{ route('admin.team-members.edit', $teamMember) }}" class="btn btn-outline-primary btn-sm rounded-3">Edit</a>
                                            <form method="POST" action="{{ route('admin.team-members.destroy', $teamMember) }}" onsubmit="return confirm('Hapus anggota tim ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm rounded-3">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-secondary">
                                        Belum ada data team member.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($teamMembers->hasPages())
                    <div class="mt-4 d-flex justify-content-end">
                        {{ $teamMembers->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

