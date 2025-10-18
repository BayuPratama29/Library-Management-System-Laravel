@extends('layouts.app')

@section('content')
<!-- Judul Halaman -->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Buku di Perpustakaan</h1>
</div>

<!-- Form Pencarian -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('student.books.index') }}">
            <div class="row g-3">
                <div class="col-md-4">
                    <label for="search" class="form-label">Cari Judul</label>
                    <input type="text" class="form-control" id="search" name="search" placeholder="Masukkan judul buku..." value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <label for="category" class="form-label">Kategori</label>
                    <select class="form-select" id="category" name="category">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="author" class="form-label">Penulis</label>
                    <select class="form-select" id="author" name="author">
                        <option value="">Semua Penulis</option>
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}" {{ request('author') == $author->id ? 'selected' : '' }}>
                                {{ $author->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100"><i class="fas fa-search"></i> Cari</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Tabel Daftar Buku -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Kategori</th>
                        <th>Tahun</th>
                        <th>Stok Tersedia</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author->name ?? 'Tidak Diketahui' }}</td>
                            <td>{{ $book->category->name ?? 'Tidak Diketahui' }}</td>
                            <td>{{ $book->year }}</td>
                            <td>
                                @if($book->stock > 0)
                                    <span class="badge bg-success">{{ $book->stock }} Tersedia</span>
                                @else
                                    <span class="badge bg-danger">Habis</span>
                                @endif
                            </td>
                            <td>
                                @if($book->stock > 0)
                                    <form action="{{ route('student.borrows.request') }}" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                                        <button type="submit" class="btn btn-sm btn-outline-primary" onclick="return confirm('Yakin ingin meminjam buku ini?')">
                                            <i class="fas fa-book"></i> Pinjam
                                        </button>
                                    </form>
                                @else
                                    <button class="btn btn-sm btn-outline-secondary" disabled>
                                        <i class="fas fa-book"></i> Tidak Tersedia
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Buku tidak ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginasi -->
        <div class="d-flex justify-content-center">
            {{ $books->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection