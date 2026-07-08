@extends('admin.layout')

@section('title', 'Tambah Key Feature')

@section('content')
    <div class="main-content-container overflow-hidden">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
            <div>
                <h3 class="mb-1">Tambah Key Feature</h3>
                <p class="text-secondary mb-0">Tambahkan fitur utama baru untuk section landing page.</p>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.key-features.store') }}">
            @csrf
            @include('admin.key-features._form', ['submitLabel' => 'Simpan'])
        </form>
    </div>
@endsection

