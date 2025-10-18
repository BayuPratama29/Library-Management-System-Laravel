@extends('layouts.app')

@section('content')
<!-- Judul Halaman -->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Peminjaman Saya</h1>
</div>

<!-- Tabel Daftar Peminjaman -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-light">
                    <tr>
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
                                @if($borrow->status === 'approved')
                                    <form action="{{ route('student.borrows.return', $borrow->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-outline-success" onclick="return confirm('Yakin ingin mengembalikan buku ini?')">
                                            <i class="fas fa-undo"></i> Kembalikan
                                        </button>
                                    </form>
                                @elseif($borrow->status === 'pending')
                                    <span class="text-muted">Menunggu Konfirmasi</span>
                                @elseif($borrow->status === 'returned')
                                    <span class="text-success">Sudah Dikembalikan</span>
                                @elseif($borrow->status === 'rejected')
                                    <span class="text-danger">Peminjaman Ditolak</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Anda belum memiliki riwayat peminjaman.</td>
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