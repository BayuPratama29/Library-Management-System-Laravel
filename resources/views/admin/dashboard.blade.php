@extends('layouts.app')

@section('content')
<!-- Judul Halaman -->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard Admin</h1>
</div>

<!-- Ringkasan Statistik -->
<div class="row">
    <!-- Jumlah Total Buku -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Buku
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

    <!-- Jumlah Total Kategori -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Kategori
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalCategories }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-tags fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jumlah Total Penulis -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Total Penulis
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalAuthors }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jumlah Total Penerbit -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total Penerbit
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPublishers }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-building fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jumlah Peminjaman Aktif -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Peminjaman Aktif
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $activeBorrows }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-exchange-alt fa-2x text-gray-300"></i>
                    </div>
                </div>
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
                <a href="{{ route('admin.books.create') }}" class="btn btn-primary mb-2 mb-md-0 me-md-2">
                    <i class="fas fa-plus"></i> Tambah Buku Baru
                </a>
                <a href="{{ route('admin.categories.create') }}" class="btn btn-success mb-2 mb-md-0 me-md-2">
                    <i class="fas fa-plus"></i> Tambah Kategori
                </a>
                <a href="{{ route('admin.authors.create') }}" class="btn btn-info mb-2 mb-md-0 me-md-2">
                    <i class="fas fa-plus"></i> Tambah Penulis
                </a>
                <a href="{{ route('admin.publishers.create') }}" class="btn btn-warning mb-2 mb-md-0">
                    <i class="fas fa-plus"></i> Tambah Penerbit
                </a>
            </div>
        </div>
    </div>
</div>

@endsection