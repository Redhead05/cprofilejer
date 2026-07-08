@extends('admin.layout')

@section('title', 'Edit FAQ')

@section('content')
    <div class="main-content-container overflow-hidden">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
            <div>
                <h3 class="mb-1">Edit FAQ</h3>
                <p class="text-secondary mb-0">Perbarui pertanyaan dan jawaban landing page.</p>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.faq-items.update', $faqItem) }}">
            @csrf
            @method('PUT')
            @include('admin.faq-items._form', ['submitLabel' => 'Perbarui'])
        </form>
    </div>
@endsection

