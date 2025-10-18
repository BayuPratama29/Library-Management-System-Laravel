@extends('layouts.app')

@section('content')
<!-- Judul Halaman -->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Peminjaman</h1>
    <!-- Tambahkan tombol untuk membuat peminjaman baru jika diperlukan -->
    <!-- <a href="{{ route('admin.borrows.create') }}" class="btn btn-primary">Tambah Peminjaman</a> -->
</div>

<!-- Tabel Daftar Peminjaman -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Mahasiswa</th>
                        <th>Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($borrows as $borrow)
                        <tr>
                            <td>{{ $borrow->id }}</td>
                            <td>{{ $borrow->user->name ?? 'Tidak Diketahui' }}</td>
                            <td>{{ $borrow->book->title ?? 'Tidak Diketahui' }}</td>
                            <td>{{ $borrow->borrow_date->format('d M Y') }}</td>
                            <td>{{ $borrow->return_date ? $borrow->return_date->format('d M Y') : '-' }}</td>
                            <td>
                                <span class="badge 
                                    @if($borrow->status === 'pending') bg-warning 
                                    @elseif($borrow->status === 'approved') bg-primary 
                                    @elseif($borrow->status === 'returned') bg-success 
                                    @elseif($borrow->status === 'rejected') bg-danger 
                                    @endif">
                                    {{ ucfirst($borrow->status) }}
                                </span>
                            </td>
                            <td>
                                @if($borrow->status === 'pending')
                                    <form action="{{ route('admin.borrows.approve', $borrow->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-outline-success" onclick="return confirm('Yakin ingin menyetujui peminjaman ini?')">
                                            <i class="fas fa-check"></i> Setujui
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.borrows.reject', $borrow->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin ingin menolak peminjaman ini?')">
                                            <i class="fas fa-times"></i> Tolak
                                        </button>
                                    </form>
                                @elseif($borrow->status === 'approved')
                                    <span class="text-muted">Menunggu Pengembalian</span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data peminjaman.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginasi -->
        <div class="d-flex justify-content-center">
            {{ $borrows->links() }}
        </div>
    </div>
</div>
@endsection