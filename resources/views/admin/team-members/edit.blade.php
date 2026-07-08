@extends('admin.layout')

@section('title', 'Edit Team Member')

@section('content')
    <div class="main-content-container overflow-hidden">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
            <div>
                <h3 class="mb-1">Edit Team Member</h3>
                <p class="text-secondary mb-0">Perbarui data anggota tim yang tampil di landing page.</p>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.team-members.update', $teamMember) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.team-members._form', ['submitLabel' => 'Perbarui'])
        </form>
    </div>
@endsection

