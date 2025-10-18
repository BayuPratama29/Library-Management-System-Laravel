@extends('layouts.app')

@section('content')
<!-- Judul Halaman -->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard Mahasiswa</h1>
</div>

<!-- Ringkasan Statistik -->
<div class="row">
    <!-- Jumlah Total Buku di Perpustakaan -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Buku di Perpustakaan
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalBooks }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jumlah Buku Dipinjam -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Buku Dipinjam
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $borrowedBooks }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-exchange-alt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jumlah Peminjaman Berlangsung -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Peminjaman Aktif
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $activeBorrows }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clock fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jumlah Riwayat Peminjaman -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Riwayat Peminjaman
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalBorrows }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-history fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Riwayat Peminjaman Terakhir -->
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Riwayat Peminjaman Terakhir</h6>
            </div>
            <div class="card-body">
                @if($recentBorrows->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th>Buku</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentBorrows as $borrow)
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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted">Anda belum pernah melakukan peminjaman.</p>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Tautan Cepat -->
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tindakan Cepat</h6>
            </div>
            <div class="card-body">
                <a href="{{ route('student.books.index') }}" class="btn btn-primary mb-2 mb-md-0 me-md-2">
                    <i class="fas fa-book"></i> Lihat Daftar Buku
                </a>
                <a href="{{ route('student.borrows.index') }}" class="btn btn-success mb-2 mb-md-0">
                    <i class="fas fa-history"></i> Lihat Riwayat Peminjaman
                </a>
            </div>
        </div>
    </div>
</div>

@endsection