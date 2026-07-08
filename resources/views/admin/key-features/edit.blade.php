@extends('admin.layout')

@section('title', 'Edit Key Feature')

@section('content')
    <div class="main-content-container overflow-hidden">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
            <div>
                <h3 class="mb-1">Edit Key Feature</h3>
                <p class="text-secondary mb-0">Perbarui data fitur utama di landing page.</p>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.key-features.update', $keyFeature) }}">
            @csrf
            @method('PUT')
            @include('admin.key-features._form', ['submitLabel' => 'Perbarui'])
        </form>
    </div>
@endsection

