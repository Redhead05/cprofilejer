@extends('admin.layout')

@section('title', 'Tambah Carousel')

@section('content')
    <div class="main-content-container overflow-hidden">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
            <div>
                <h3 class="mb-1">Tambah Carousel</h3>
                <p class="text-secondary mb-0">Tambahkan slide banner baru untuk carousel landing page.</p>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.carousel.store') }}" enctype="multipart/form-data">
            @csrf
            @include('admin.carousel._form', ['submitLabel' => 'Simpan'])
        </form>
    </div>
@endsection

