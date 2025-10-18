@extends('layouts.app')

@section('content')
<!-- Judul Halaman -->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Penerbit Baru</h1>
</div>

<!-- Form Tambah Penerbit -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.publishers.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Penerbit</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3" required>{{ old('address') }}</textarea>
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Telepon</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan Penerbit</button>
            <a href="{{ route('admin.publishers.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection