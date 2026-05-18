@extends('layouts.app')

@section('title', 'Detail Kategori ' . $kategori['nama'])

@section('content')
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb bg-white p-3 rounded shadow-sm">
        <li class="breadcrumb-item"><a href="{{ route('kategori.index') }}">Kategori</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail {{ $kategori['nama'] }}</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm border-0 rounded bg-dark text-white">
            <div class="card-body p-4">
                <h6 class="text-primary fw-bold text-uppercase tracking-wider">Detail Kategori</h6>
                <h3 class="fw-bold my-2">{{ $kategori['nama'] }}</h3>
                <p class="text-light-50 fs-6 opacity-75">{{ $kategori['deskripsi'] }}</p>
                <hr class="border-secondary">
                <div class="d-flex justify-content-between align-items-center">
                    <span>Total Koleksi Judul:</span>
                    <span class="badge bg-primary px-3 py-2 fs-6 rounded-pill">{{ count($buku_list) }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card shadow-sm border-0 rounded">
            <div class="card-header bg-white py-3 border-0">
                <h5 class="mb-0 fw-bold text-dark">Daftar Koleksi Buku Terkait</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">ID Buku</th>
                                <th>Judul Buku</th>
                                <th>Pengarang</th>
                                <th class="text-center pe-4">Sisa Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($buku_list as $buku)
                            <tr>
                                <td class="ps-4 fw-semibold text-secondary">#{{ $buku['id'] }}</td>
                                <td class="fw-bold text-dark">{{ $buku['judul'] }}</td>
                                <td>{{ $buku['pengarang'] }}</td>
                                <td class="text-center pe-4">
                                    @if($buku['stok'] > 5)
                                        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3">{{ $buku['stok'] }}</span>
                                    @else
                                        <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-3">{{ $buku['stok'] }}</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-secondary">
                                    <span class="fs-4 d-block">📭</span> Belum ada koleksi buku untuk kategori ini.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection