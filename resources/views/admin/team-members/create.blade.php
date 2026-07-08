@extends('admin.layout')

@section('title', 'Tambah Team Member')

@section('content')
    <div class="main-content-container overflow-hidden">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
            <div>
                <h3 class="mb-1">Tambah Team Member</h3>
                <p class="text-secondary mb-0">Tambahkan anggota tim baru untuk section team di landing page.</p>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.team-members.store') }}" enctype="multipart/form-data">
            @csrf
            @include('admin.team-members._form', ['submitLabel' => 'Simpan'])
        </form>
    </div>
@endsection

