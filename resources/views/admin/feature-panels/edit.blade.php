@extends('admin.layout')

@section('title', 'Edit Feature')

@section('content')
    <div class="main-content-container overflow-hidden">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
            <div>
                <h3 class="mb-1">Edit Feature</h3>
                <p class="text-secondary mb-0">Perbarui data panel feature di landing page.</p>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.feature-panels.update', $featurePanel) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.feature-panels._form', ['submitLabel' => 'Perbarui'])
        </form>
    </div>
@endsection

