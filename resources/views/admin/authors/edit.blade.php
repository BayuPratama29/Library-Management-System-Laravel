@extends('layouts.app')

@section('content')
<!-- Judul Halaman -->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Penulis: {{ $author->name }}</h1>
</div>

<!-- Form Edit Penulis -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.authors.update', $author->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama Penulis</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $author->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Penulis</button>
            <a href="{{ route('admin.authors.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection